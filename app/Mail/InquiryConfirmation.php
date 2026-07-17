<?php

declare(strict_types=1);

namespace App\Mail;

use App\Models\AdmissionInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InquiryConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public AdmissionInquiry $inquiry;

    public function __construct(AdmissionInquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Admission Inquiry Received',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.inquiry-confirmation',
        );
    }
}
