<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactoController;

Route::get('/', function () {
    $projects = DB::table('projects')->latest()->take(5)->get();
    return view('welcome', compact('projects'));
});

Route::get('/about', [ClientController::class, 'index']);

Route::get('/services', function () {
    return view('services');
});

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');

Route::view('/contacto', 'contacto')->name('contacto');
Route::post('/contacto/enviar', [ContactoController::class, 'enviarFormulario'])->name('contacto.enviar');
