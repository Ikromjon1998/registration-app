<?php

namespace App\Notifications;

use App\Models\Applicant;
use Carbon\CarbonImmutable;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewApplicant extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private Applicant $applicant)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("New Applicant  {$this->applicant->id}")
            ->greeting("New applicant from {$this->applicant->first_name}")
            ->line($this->applicant->information().CarbonImmutable::now()->toString())
            ->action('Go to app', url('/'))
            ->line('Thank you for using our application!');
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
