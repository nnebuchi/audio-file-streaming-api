<?php

namespace App\Providers;

use App\Providers\PasswordResetRequested;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  \App\Providers\PasswordResetRequested  $event
     * @return void
     */
    public function handle(PasswordResetRequested $event)
    {
        //
    }
}
