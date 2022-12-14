<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use App\Listeners\PaddleEventListener;
use Illuminate\Auth\Events\Registered;
use Laravel\Paddle\Events\WebhookReceived;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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

        WebhookReceived::class => [
            PaddleEventListener::class,
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
