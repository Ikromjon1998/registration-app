<?php

namespace App\Listeners;

use App\Events\ApplicantCreated;
use App\Notifications\NewApplicant;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendApplicantCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ApplicantCreated $event): void
    {
        // send email to applicant
        $event->applicant->notify(new NewApplicant($event->applicant));
    }
}
