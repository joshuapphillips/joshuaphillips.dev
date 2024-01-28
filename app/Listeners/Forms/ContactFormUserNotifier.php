<?php

namespace App\Listeners\Forms;

use App\Events\Forms\ContactFormSubmitted;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFormUserNotifier implements ShouldQueue
{
    public function handle(ContactFormSubmitted $event): void
    {
        //
    }
}
