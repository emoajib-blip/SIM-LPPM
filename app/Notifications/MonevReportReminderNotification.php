<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MonevReportReminderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public int $count,
        public string $academicYear,
        public string $semester
    ) {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'type' => 'monev_report_reminder',
            'title' => 'Peringatan: Laporan Monev Belum Dikirim',
            'message' => "Terdapat {$this->count} hasil Monev ({$this->academicYear} {$this->semester}) yang sudah disahkan namun belum dilaporkan ke Rektor.",
            'body' => "Admin LPPM memberikan peringatan: Mohon segera melaporkan rekapitulasi Monev periode {$this->academicYear} semester {$this->semester} kepada Rektor untuk tertib administrasi.",
            'academic_year' => $this->academicYear,
            'semester' => $this->semester,
            'count' => $this->count,
            'link' => route('kepala-lppm.monev.recap', ['academic_year' => $this->academicYear, 'semester' => $this->semester]),
            'icon' => 'alert-triangle',
            'created_at' => now()->toISOString(),
        ];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $url = route('kepala-lppm.monev.recap', ['academic_year' => $this->academicYear, 'semester' => $this->semester]);

        return (new MailMessage)
            ->subject('[SIM LPPM] Peringatan Laporan Monev ke Rektor')
            ->greeting('Halo, '.$notifiable->name.'!')
            ->line("Admin LPPM memberitahukan bahwa terdapat **{$this->count} hasil Monev** periode **{$this->academicYear} {$this->semester}** yang sudah Anda sahkan namun belum dikirimkan laporannya ke Rektor.")
            ->line('Mohon segera melakukan pengiriman laporan melalui menu Rekapitulasi Monev.')
            ->action('Lihat Rekapitulasi', $url)
            ->line('Terima kasih atas kerja samanya.');
    }
}
