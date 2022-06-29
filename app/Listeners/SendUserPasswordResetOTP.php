<?php

namespace App\Listeners;

use App\Events\UserPasswordResetRequested;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\UserPasswordResetOTP;
use Illuminate\Support\Facades\Mail;

class SendUserPasswordResetOTP
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserPasswordResetRequested  $event
     * @return void
     */
    public function handle(UserPasswordResetRequested $event)
    {
        Mail::to($event->passwordReset->email)->send(new UserPasswordResetOTP($event->passwordReset));
    }
}
