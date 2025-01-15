<?php

namespace App\Listeners;

use App\Mail\RegistrationOptMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOtpAndMailListener
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
    public function handle(object $event): void
    {
        Mail::to($event->user->email)
            ->send(new RegistrationOptMail($event->user->generateConfirmationOtp(),$event->user->first_name) );
        dd($event->user->first_name);
    }
}
