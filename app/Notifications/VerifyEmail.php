<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class VerifyEmail extends Notification
{
    use Queueable;

    /**
     * The NIK of the user.
     *
     * @var string
     */
    public $nik;

    /**
     * Create a new notification instance.
     *
     * @param  string  $nik
     */
    public function __construct($nik)
    {
        $this->nik = $nik;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $verificationUrl = URL::signedRoute('verification.verify', ['id' => $this->nik,'hash' => sha1($notifiable->getEmailForVerification())]);

        return (new MailMessage)
        ->subject(Lang::get('Verify Email Address'))
        ->line(Lang::get('Please click the button below to verify your email address.'))
        ->action(Lang::get('Verify Email Address'), $verificationUrl)
        ->line(Lang::get('If you did not create an account, no further action is required.'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
