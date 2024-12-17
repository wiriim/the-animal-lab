<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $formData;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $formData)
    {
        //
        $this->user = $user;
        $this->formData = $formData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('verified-office365-email@demomailtrap.com', 'The Animal Lab'),
            replyTo: [
                new Address($this->user['email'], $this->user['name']), // User's email as Reply-To
            ],
            subject: $this->formData['subject'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            text: 'email.message',
            with: ['description' => $this->formData['description']],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        if (isset($this->formData['attachment']) && is_array($this->formData['attachment'])) {
            foreach ($this->formData['attachment'] as $file) {
                $attachments[] = Attachment::fromPath($file->getRealPath())
                    ->as($file->getClientOriginalName())
                    ->withMime($file->getMimeType());
            }
        }


        return $attachments;
    }
}
