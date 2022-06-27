<?php

namespace App\Listeners;

use App\Events\CreatorCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\CreatorVerificationMail;
use Illuminate\Support\Facades\Mail;

class SendCreatorEmailVerificationMail
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
     * @param  \App\Events\CreatorCreated  $event
     * @return void
     */
    public function handle(CreatorCreated $event)
    {
        Mail::to($event->creator->email)->send(new CreatorVerificationMail($event->creator));
    }
}
