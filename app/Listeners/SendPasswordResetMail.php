<?php

namespace App\Listeners;

use App\Events\PasswordResetRequested;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Mail;

class SendPasswordResetMail
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
     * @param  \App\Events\PasswordResetRequested  $event
     * @return void
     */
    public function handle(PasswordResetRequested $event)
    {   

        Mail::to($event->passwordReset->email)->send(new PasswordResetMail($event->passwordReset));
    }
}
