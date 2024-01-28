<?php

namespace App\Providers;

use App\Events\Forms\ContactFormSubmitted;
use App\Listeners\Forms\ContactFormOwnerNotifier;
use App\Listeners\Forms\ContactFormUserNotifier;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ContactFormSubmitted::class => [
            ContactFormUserNotifier::class,
            ContactFormOwnerNotifier::class,
        ],
    ];

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
