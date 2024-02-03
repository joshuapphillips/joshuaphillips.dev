<?php

namespace App\Mail;

use App\Models\Communication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormUserNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        private Communication $communication
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank You For Your Message!',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.contact-form-user-notification',
        );
    }
}
