<?php

namespace App\Notifications;

use Filament\Notifications\Notification as FNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use QCod\Gamify\Badge;

class BadgeEarnedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Badge $badge)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toDatabase(object $notifiable): array
    {
        $iconUrl = asset($this->badge->icon);

        return FNotification::make()
            ->title('🏅 New Badge Unlocked!')
            ->body("
            <div style='display:flex; align-items:center; gap:14px; padding:4px 0;'>
                <img src='{$iconUrl}' style='width:56px; height:auto; flex-shrink:0;' />
                <div style='display:flex; flex-direction:column; gap:3px;'>
                    <div style='font-weight:700; font-size:14px;'>{$this->badge->name}</div>
                    <div style='font-size:12px; opacity:0.65; line-height:1.4;'>{$this->badge->description}</div>
                    <div style='font-size:11px; margin-top:2px; opacity:0.45;'>Keep going — next badge awaits </div>
                </div>
            </div>
        ")
            ->success()
            ->actions([])
            ->getDatabaseMessage();
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("🏅 You earned a new badge — {$this->badge->name}")
            ->greeting("Hey {$notifiable->name}!")
            ->line("You just earned the **{$this->badge->name}** badge.")
            ->line($this->badge->description)
            ->action('View Your Badges', url('/member'))
            ->line('Keep it up! 🚀');
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
