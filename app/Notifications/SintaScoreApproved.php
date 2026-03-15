<?php

namespace App\Notifications;

use App\Models\SintaScoreSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SintaScoreApproved extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public SintaScoreSubmission $submission
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
            'type' => 'sinta_score_approved',
            'title' => 'Skor SINTA Diverifikasi',
            'message' => 'Skor SINTA Anda telah diverifikasi oleh admin LPPM',
            'submission_id' => $this->submission->id,
            'score' => $this->submission->sinta_score_v3_overall,
            'link' => route('settings.profile'),
            'icon' => 'check-circle',
            'created_at' => now()->toISOString(),
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('[SIM LPPM] Skor SINTA Diverifikasi')
            ->greeting('Halo, '.$notifiable->name.'!')
            ->line("Skor SINTA Anda sebesar {$this->submission->sinta_score_v3_overall} telah diverifikasi oleh admin LPPM.")
            ->action('Lihat Profil', route('settings.profile'))
            ->line('Terima kasih telah memperbarui data akademik Anda.');
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
