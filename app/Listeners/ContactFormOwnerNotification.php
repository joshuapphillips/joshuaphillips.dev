<?php

namespace App\Listeners;

use App\Enums\CommunicationTypes;
use App\Events\ContactFormSubmitted;
use App\Exceptions\ContactFormOwnerNotificationException;
use App\Mail\ContactFormOwnerNotification as Email;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactFormOwnerNotification implements ShouldQueue
{
    public function handle(ContactFormSubmitted $event): void
    {
        try {
            $communication = $event->communication;

            throw_unless(
                $communication->type === CommunicationTypes::GENERAL_CONTACT,
                new Exception('Communication type is not '.CommunicationTypes::GENERAL_CONTACT)
            );

            Mail::send(new Email($communication));
        } catch (Throwable $throwable) {
            throw new ContactFormOwnerNotificationException(
                $event->communication,
                $throwable->getMessage()
            );
        }
    }
}
