<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($service) {
            // Verificar si la imagen existe y eliminarla
            if (!empty($service->image) && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }
        });
    }
}
