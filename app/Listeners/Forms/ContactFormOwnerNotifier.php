<?php

namespace App\Listeners\Forms;

use App\Events\Forms\ContactFormSubmitted;
use App\Mail\ContactFormOwnerNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class ContactFormOwnerNotifier implements ShouldQueue
{
    public function handle(ContactFormSubmitted $event): void
    {
        try {
            $communication = $event->communication;

            throw_unless(
                $communication->type === CommunicationTypes::GENERAL_CONTACT,
                new Exception('Communication type is not general contact.')
            );

            $content = $communication->content;

            throw_unless(
                $to = $content['email'],
                new Exception('Email address not found in communication content.')
            );

            Mail::to($to)->send(new ContactFormOwnerNotification($communication));
        } catch (Exception $exception) {
            Log::error("Contact form owner notification failed. Message: {$exception->getMessage()}");
        }
    }
}
