<?php

namespace App\Notifications;

use App\Models\SintaScoreSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SintaScoreRejected extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public SintaScoreSubmission $submission,
        public string $reason
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the array representation of the notification.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'type' => 'sinta_score_rejected',
            'title' => 'Pengajuan Skor SINTA Ditolak',
            'message' => "Pengajuan skor SINTA Anda ditolak: {$this->reason}",
            'submission_id' => $this->submission->id,
            'score' => $this->submission->sinta_score_v3_overall,
            'reason' => $this->reason,
            'link' => route('settings.profile'),
            'icon' => 'x-circle',
            'created_at' => now()->toISOString(),
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('[SIM LPPM] Pengajuan Skor SINTA Ditolak')
            ->greeting('Halo, '.$notifiable->name.'!')
            ->line("Pengajuan skor SINTA Anda sebesar {$this->submission->sinta_score_v3_overall} ditolak oleh admin LPPM.")
            ->line('Alasan penolakan: '.$this->reason)
            ->action('Lihat Profil', route('settings.profile'))
            ->line('Silakan periksa kembali data yang Anda input dan ajukan ulang jika diperlukan.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
