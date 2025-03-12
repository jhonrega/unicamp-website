<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;

    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    public function build()
    {
        // Verificar que la vista realmente exista antes de generar el PDF
        if (!view()->exists('emails.pdf_contacto')) {
            throw new \Exception("La vista 'emails.pdf_contacto' no existe.");
        }

        // Generar el PDF con los datos del formulario
        $pdf = Pdf::loadView('emails.pdf_contacto', ['datos' => $this->datos]);

        return $this->from(config('mail.from.address'))
                    ->subject('Nuevo mensaje de contacto')
                    ->view('emails.contacto') // La vista del email
                    ->attachData($pdf->output(), 'solicitud_contacto.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
