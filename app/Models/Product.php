<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'especificaciones', 'imagenes', 'pdf']; // Agregado 'pdf'

    protected $casts = [
        'especificaciones' => 'array',
        'imagenes' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            if (!empty($product->imagenes)) {
                foreach ($product->imagenes as $imagen) {
                    Storage::disk('public')->delete($imagen);
                }
            }

            // Borrar el PDF si existe
            if ($product->pdf) {
                Storage::disk('public')->delete($product->pdf);
            }
        });
    }
}
