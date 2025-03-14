<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image']; // Asegúrate de tener estos campos

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($project) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image); // Elimina la imagen almacenada
            }
        });
    }
}
