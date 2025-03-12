<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'email', 'whatsapp', 'ciudad', 
        'tamano', 'cantidad', 'tipo', 'material', 
        'informacion_adicional', 'numero_cotizacion'
    ];
}

