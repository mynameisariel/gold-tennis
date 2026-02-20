<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PackageConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $package;
    public $user;
    public $timeSlot;
    public $lesson;

    /**
     * Create a new message instance.
     */
    public function __construct($package)
    {
        $this->package = $package;
        $this->user = $package->user;
        $this->lesson = $package->lessonPackage->lesson;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Lesson Package Confirmed - Gold Tennis Academy',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.package-confirmation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
} 