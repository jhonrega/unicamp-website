<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'especificaciones', 'imagenes'];

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
                    Storage::disk('public')->delete($imagen); // Borra cada imagen del array
                }
            }
        });
    }
}
