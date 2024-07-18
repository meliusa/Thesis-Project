<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\SubmissionModule;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    public $submissionModule;
    public $adminNumber;

    /**
     * Create a new message instance.
     */
    public function __construct(SubmissionModule $submissionModule, $adminNumber)
    {
        $this->submissionModule = $submissionModule;
        $this->adminNumber = $adminNumber;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verifikasi Kehadiran Rapat',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mely.mely.meeting.email.attendance-verification',
            
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
