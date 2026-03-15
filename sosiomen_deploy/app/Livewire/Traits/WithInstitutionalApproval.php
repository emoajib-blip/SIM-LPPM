<?php

namespace App\Livewire\Traits;

use App\Enums\InstitutionalReportStatus;
use App\Models\InstitutionalReport;
use Illuminate\Support\Facades\DB;

trait WithInstitutionalApproval
{
    public string $approvalNotes = '';

    public function submitInstitutionalReport(string $type, int $year, array $metadata = []): void
    {
        if (active_role() !== 'kepala lppm') {
            $this->toastError('Hanya Kepala LPPM yang dapat mengajukan laporan institusi.');

            return;
        }

        try {
            DB::transaction(function () use ($type, $year, $metadata) {
                InstitutionalReport::updateOrCreate(
                    ['type' => $type, 'year' => $year],
                    [
                        'status' => InstitutionalReportStatus::SUBMITTED,
                        'submitted_at' => now(),
                        'submitted_by' => auth()->id(),
                        'metadata' => $metadata,
                    ]
                );
            });

            $this->toastSuccess('Laporan berhasil diajukan ke Rektor.');
            $this->dispatch('institutional-report-submitted');
        } catch (\Exception $e) {
            $this->toastError('Gagal mengajukan laporan: '.$e->getMessage());
        }
    }

    public function approveInstitutionalReport(string $type, int $year): void
    {
        if (active_role() !== 'rektor') {
            $this->toastError('Hanya Rektor yang dapat menyetujui laporan institusi.');

            return;
        }

        try {
            DB::transaction(function () use ($type, $year) {
                $report = InstitutionalReport::where('type', $type)->where('year', $year)->first();
                if (! $report || $report->status !== InstitutionalReportStatus::SUBMITTED) {
                    throw new \Exception('Laporan tidak ditemukan atau belum diajukan.');
                }

                $report->update([
                    'status' => InstitutionalReportStatus::APPROVED,
                    'approved_at' => now(),
                    'approved_by' => auth()->id(),
                ]);

                // Trigger digital signature generation logic if needed
            });

            $this->toastSuccess('Laporan berhasil disetujui.');
            $this->dispatch('institutional-report-approved');
        } catch (\Exception $e) {
            $this->toastError('Gagal menyetujui laporan: '.$e->getMessage());
        }
    }

    public function rejectInstitutionalReport(string $type, int $year): void
    {
        if (active_role() !== 'rektor') {
            $this->toastError('Hanya Rektor yang dapat menolak laporan institusi.');

            return;
        }

        $this->validate([
            'approvalNotes' => 'required|string|min:5',
        ]);

        try {
            DB::transaction(function () use ($type, $year) {
                $report = InstitutionalReport::where('type', $type)->where('year', $year)->first();
                if (! $report || $report->status !== InstitutionalReportStatus::SUBMITTED) {
                    throw new \Exception('Laporan tidak ditemukan atau belum diajukan.');
                }

                $report->update([
                    'status' => InstitutionalReportStatus::REJECTED,
                    'notes' => $this->approvalNotes,
                ]);
            });

            $this->toastSuccess('Laporan telah dikembalikan untuk perbaikan.');
            $this->dispatch('institutional-report-rejected');
        } catch (\Exception $e) {
            $this->toastError('Gagal memproses penolakan: '.$e->getMessage());
        }
    }

    protected function getInstitutionalReport(string $type, int $year): ?InstitutionalReport
    {
        return InstitutionalReport::where('type', $type)->where('year', $year)->first();
    }
}
