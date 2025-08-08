<?php

namespace App\Mail;

use App\Models\Form;
use App\Services\PdfService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormToClient extends Mailable
{
    use Queueable, SerializesModels;

    private Form $form;

    /**
     * Create a new message instance.
     */
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'MPS Controls - ' . ($this->form->type->label() ?? ""),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.form-to-client',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $pdfService = app(PdfService::class);
        $pdfContent = $pdfService->generatePdfContent($this->form);
        $formatted_id = str_pad($this->form->id, 7, '0', STR_PAD_LEFT);
        $filename = "formulario_$formatted_id.pdf";

        return [
            \Illuminate\Mail\Mailables\Attachment::fromData(
                fn () => $pdfContent,
                $filename
            )->withMime('application/pdf'),
        ];
    }
}
