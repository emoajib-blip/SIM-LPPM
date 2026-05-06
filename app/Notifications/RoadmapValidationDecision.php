<?php

namespace App\Notifications;

use App\Models\StudyProgram;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RoadmapValidationDecision extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public StudyProgram $studyProgram,
        public string $decision,
        public User $dekan,
        public ?string $notes = null
    ) {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toDatabase(object $notifiable): array
    {
        $isApproved = $this->decision === 'approved';
        $title = $isApproved ? 'Roadmap Disetujui Dekan' : 'Roadmap Ditolak Dekan';
        $message = "Roadmap penelitian {$this->studyProgram->name} telah ".($isApproved ? 'disetujui' : 'ditolak').' oleh Dekan';
        $icon = $isApproved ? 'check-circle' : 'alert-circle';

        return [
            'type' => 'roadmap_validation_decision',
            'decision' => $this->decision,
            'title' => $title,
            'message' => $message,
            'study_program_id' => $this->studyProgram->id,
            'study_program_name' => $this->studyProgram->name,
            'dekan_id' => $this->dekan->id,
            'dekan_name' => $this->dekan->name,
            'notes' => $this->notes,
            'link' => route('settings.master-data', ['group' => 'academic-structure', 'tab' => 'study-program-roadmaps']),
            'icon' => $icon,
            'created_at' => now()->toISOString(),
        ];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $isApproved = $this->decision === 'approved';
        $subject = $isApproved ? 'Roadmap Penelitian Disetujui oleh Dekan' : 'Roadmap Penelitian Ditolak oleh Dekan';

        $message = (new MailMessage)
            ->subject('[SIM LPPM] '.$subject)
            ->greeting('Halo, '.$notifiable->name.'!')
            ->line("Dekan telah membuat keputusan untuk roadmap penelitian **{$this->studyProgram->name}**.");

        if ($isApproved) {
            $message->line('✅ **Status:** Disetujui')
                ->line('Roadmap penelitian telah disetujui oleh Dekan dan dapat digunakan sebagai acuan alignment proposal.');
        } else {
            $message->line('❌ **Status:** Ditolak')
                ->line('Roadmap penelitian ditolak oleh Dekan. Silakan lakukan perbaikan sesuai catatan yang diberikan.');
        }

        if ($this->notes) {
            $message->line("**Catatan Dekan:** {$this->notes}");
        }

        return $message->line("**Program Studi:** {$this->studyProgram->name}")
            ->line("**Dekan:** {$this->dekan->name}")
            ->action('Lihat Roadmap', route('settings.master-data', ['group' => 'academic-structure', 'tab' => 'study-program-roadmaps']))
            ->line('Terima kasih atas partisipasi Anda dalam sistem LPPM ITSNU.');
    }
}
