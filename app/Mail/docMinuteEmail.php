<?php

namespace App\Mail;

use App\Models\DocMinute;
use App\Models\DocMinuteQnaDetails;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\SubmissionModule;
use Illuminate\Database\Eloquent\Collection;

class docMinuteEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $docMinute;
    public $docMinuteQnaDetails;
    public $submissionModule;

    /**
     * Create a new message instance.
     */
    public function __construct(DocMinute $docMinute, Collection $docMinuteQnaDetails, SubmissionModule $submissionModule)
    {
        $this->docMinute = $docMinute;
        $this->docMinuteQnaDetails = $docMinuteQnaDetails;
        $this->submissionModule = $submissionModule;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Dokumentasi & Notulensi Rapat',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mely.mely.meeting.email.doc-minute',
            
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
