<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Events\UserCreated;
use App\Listeners\SendVerifyOTP;
use App\Events\CreatorCreated;
use App\Listeners\SendCreatorEmailVerificationMail;
use App\Events\PasswordResetRequested;
use App\Listeners\SendPasswordResetMail;
use App\Events\UserPasswordResetRequested;
use App\Listeners\SendUserPasswordResetOTP;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserCreated::class => [
            SendVerifyOTP::class,
        ],

        CreatorCreated::class => [
            SendCreatorEmailVerificationMail::class,
        ],

        PasswordResetRequested::class => [
            SendPasswordResetMail::class,
        ],

        UserPasswordResetRequested::class => [
            SendUserPasswordResetOTP::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
