<?php

namespace App\Notifications;

use Filament\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class CustomVerifyEmail extends VerifyEmail
{
    public function toMail($notifiable): MailMessage
    {
        $url = $this->url ?? $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Verify your account')
            ->view('partials.emails.verify', ['url' => $url, 'user' => $notifiable]);
    }
}
