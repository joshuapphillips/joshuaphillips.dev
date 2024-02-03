<?php

namespace App\Providers;

use App\Events\ContactFormSubmitted;
use App\Listeners\ContactFormOwnerNotification;
use App\Listeners\ContactFormUserNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ContactFormSubmitted::class => [
            ContactFormOwnerNotification::class,
            ContactFormUserNotification::class,
        ],
    ];

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
