<?php

namespace App\Mail;

use App\Models\Communication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormOwnerNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        private Communication $communication
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            to: config('contact.email_address'),
            subject: 'Contact Form Owner Notification',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.contact-form-owner-notification',
        );
    }
}
