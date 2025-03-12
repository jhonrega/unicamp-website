<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\ContactoMail;
use App\Models\Cotizacion;
use Illuminate\Support\Facades\Storage;

class ContactoController extends Controller
{
    public function enviarFormulario(Request $request)
    {
         $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'whatsapp' => 'required|string',
            'ciudad' => 'required|string',
            'cotizacion' => 'required|in:Sí,No',
            'tamano' => $request->cotizacion == "Sí" ? 'required|string' : 'nullable',
            'cantidad' => $request->cotizacion == "Sí" ? 'required|integer|min:1' : 'nullable',
            'tipo' => $request->cotizacion == "Sí" ? 'required|string' : 'nullable',
            'material' => $request->cotizacion == "Sí" ? 'required|string' : 'nullable',
            'informacion_adicional' => 'nullable|string',
        ]);
    
        // Obtener el último número de cotización
        $ultimoNumero = Cotizacion::max('numero_cotizacion') ?? 0;
        $numeroCotizacion = $ultimoNumero + 1;
    
        // Guardar los datos en la base de datos
        $cotizacion = Cotizacion::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'ciudad' => $request->ciudad,
            'tamano' => $request->cotizacion == "Sí" ? $request->tamano : null,
            'cantidad' => $request->cotizacion == "Sí" ? $request->cantidad : null,
            'tipo' => $request->cotizacion == "Sí" ? $request->tipo : null,
            'material' => $request->cotizacion == "Sí" ? $request->material : null,
            'informacion_adicional' => $request->informacion_adicional,
            'numero_cotizacion' => $numeroCotizacion,
        ]);
    
        // Generar el PDF con base en la opción seleccionada
        if ($request->cotizacion == "Sí") {
            $pdf = Pdf::loadView('emails.pdf_contacto', ['datos' => $cotizacion]);
        } else {
            $pdf = Pdf::loadView('emails.pdf_contacto', ['datos' => $cotizacion]);
        }
    
        // Guardar el PDF
        $pdfPath = 'cotizaciones/Cotizacion_' . $numeroCotizacion . '.pdf';
        Storage::put('public/' . $pdfPath, $pdf->output());
    
        // Enviar el correo con el PDF adjunto
        Mail::to('universaldecampamentos@gmail.com')->send(new ContactoMail($cotizacion, $pdfPath));
    
        return back()->with('success', 'Formulario enviado correctamente. Pronto te contactaremos.');
    }
    

}
