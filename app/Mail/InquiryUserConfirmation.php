<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InquiryUserConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $inquiry) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(
                config('mail.from.address'),
                config('karafence.name', 'Karafence Academy')
            ),
            subject: 'Welcome to ' . config('karafence.name') . ' — We Will Contact You Shortly',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.inquiry-user',
        );
    }
}
