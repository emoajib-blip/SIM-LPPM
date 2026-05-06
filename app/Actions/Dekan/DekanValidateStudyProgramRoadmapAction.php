<?php

namespace App\Actions\Dekan;

use App\Models\StudyProgram;
use App\Models\User;
use App\Notifications\RoadmapValidationDecision;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DekanValidateStudyProgramRoadmapAction
{
    public function __construct(
        protected NotificationService $notificationService
    ) {}

    /**
     * Execute the Dekan validation for a study program roadmap.
     *
     * @param  StudyProgram  $studyProgram  The study program to validate
     * @param  string  $decision  'approved' or 'rejected'
     * @param  string|null  $notes  Validation notes from Dekan
     * @param  User|null  $dekan  The Dekan user (defaults to authenticated user)
     * @return array{success: bool, message: string}
     */
    public function execute(StudyProgram $studyProgram, string $decision, ?string $notes = null, ?User $dekan = null): array
    {
        if (! in_array($decision, ['approved', 'rejected'])) {
            return [
                'success' => false,
                'message' => 'Keputusan validasi tidak valid.',
            ];
        }

        if ($studyProgram->roadmap_status !== 'submitted') {
            return [
                'success' => false,
                'message' => 'Roadmap harus dalam status "Menunggu Validasi" untuk diproses.',
            ];
        }

        $dekan = $dekan ?? Auth::user();

        if (! $dekan->hasRole('dekan')) {
            return [
                'success' => false,
                'message' => 'Hanya Dekan yang dapat memvalidasi roadmap.',
            ];
        }

        $dekanFacultyId = $dekan->identity?->faculty_id;
        $programFacultyId = $studyProgram->faculty_id;

        if ($dekanFacultyId && $programFacultyId && $dekanFacultyId !== $programFacultyId) {
            return [
                'success' => false,
                'message' => 'Dekan hanya dapat memvalidasi roadmap dari fakultas yang sama.',
            ];
        }

        if (! $studyProgram->research_roadmap) {
            return [
                'success' => false,
                'message' => 'Roadmap penelitian belum diisi oleh Kaprodi.',
            ];
        }

        try {
            DB::transaction(function () use ($studyProgram, $decision, $notes, $dekan): void {
                $newStatus = $decision === 'approved' ? 'approved' : 'rejected';

                $studyProgram->update([
                    'roadmap_status' => $newStatus,
                ]);

                Log::info('Dekan validated study program roadmap', [
                    'study_program_id' => $studyProgram->id,
                    'study_program_name' => $studyProgram->name,
                    'decision' => $decision,
                    'dekan_id' => $dekan->id,
                    'notes' => $notes,
                ]);

                $this->sendNotifications($studyProgram, $decision, $dekan, $notes);
            });

            $message = $decision === 'approved'
                ? "Roadmap penelitian {$studyProgram->name} berhasil disetujui."
                : "Roadmap penelitian {$studyProgram->name} ditolak. Kaprodi akan diberitahu untuk melakukan perbaikan.";

            return [
                'success' => true,
                'message' => $message,
            ];
        } catch (\Exception $e) {
            Log::error('Dekan roadmap validation failed', [
                'study_program_id' => $studyProgram->id,
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'message' => 'Terjadi kesalahan saat memproses validasi: '.$e->getMessage(),
            ];
        }
    }

    /**
     * Send notifications based on validation decision.
     */
    protected function sendNotifications(StudyProgram $studyProgram, string $decision, User $dekan, ?string $notes = null): void
    {
        $recipients = collect();

        if ($studyProgram->kaprodi) {
            $recipients->push($studyProgram->kaprodi);
        }

        $kaprodiUsers = User::role('kaprodi')->get();
        foreach ($kaprodiUsers as $kaprodi) {
            if ($kaprodi->identity?->faculty_id === $dekan->identity?->faculty_id) {
                $recipients->push($kaprodi);
            }
        }

        $recipients = $recipients->unique('id')->values();

        if ($recipients->isNotEmpty()) {
            $notification = new RoadmapValidationDecision($studyProgram, $decision, $dekan, $notes);
            $this->notificationService->send($recipients, $notification);
        }
    }
}
