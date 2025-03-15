<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($client) {
            // Verificar si el logo existe y eliminarlo
            if (!empty($client->logo) && Storage::disk('public')->exists($client->logo)) {
                Storage::disk('public')->delete($client->logo);
            }
        });
    }
}
