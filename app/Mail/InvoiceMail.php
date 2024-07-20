<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $registrations;
    public $location_name;
    public $link_bayar;
    public $time_expired;

    /**
     * Create a new message instance.
     */
    public function __construct(Registration $registrations, $location_name, $link_bayar, $time_expired)
    {
        $this->registrations = $registrations;
        $this->location_name = $location_name;
        $this->link_bayar    = $link_bayar;
        $this->time_expired  = $time_expired;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'APJII - Invoice ' . $this->registrations->invoice_number,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.invoice',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments(): array
    {
        return [
            Attachment::fromStorageDisk('public', 'invoice/' . $this->registrations->invoice_number . '.pdf')->withMime('application/pdf'),
        ];

        return [
            public_path('/storage/invoice/' . $this->registrations->invoice_number . '.pdf'),
        ];
    }
}
