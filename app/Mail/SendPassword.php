<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendPassword extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(private readonly string $newPass, private readonly string $email)
    {
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Password',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.sendPassword',
            with: [
                'email' => $this->email,
                'newPass' => $this->newPass
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
