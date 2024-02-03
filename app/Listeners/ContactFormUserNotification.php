<?php

namespace App\Listeners;

use App\Enums\CommunicationTypes;
use App\Events\ContactFormSubmitted;
use App\Exceptions\ContactFormUserNotificationException;
use App\Mail\ContactFormUserNotification as Email;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Throwable;

class ContactFormUserNotification implements ShouldQueue
{
    /**
     * @todo Add Slack Notification
     */
    public function handle(ContactFormSubmitted $event): void
    {
        try {
            throw_unless(
                $communication->type->value === CommunicationTypes::GENERAL_CONTACT->value,
                new Exception('Communication type is not '.CommunicationTypes::GENERAL_CONTACT->value)
            );

            $email = $event->communication->content?->email;
            $name = $event->communication->content?->name;

            throw_unless(
                Str::isEmail($email),
                new Exception("{$email} is not a valid email address")
            );

            Mail::to($email, $name)->send(new Email($event->communication));
        } catch (Throwable $throwable) {
            throw new ContactFormUserNotificationException(
                $event->communication,
                $throwable->getMessage()
            );
        }
    }
}
