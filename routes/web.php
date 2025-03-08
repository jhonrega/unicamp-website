<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    $projects = DB::table('projects')->latest()->take(5)->get();
    return view('welcome', compact('projects'));
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/about', [ClientController::class, 'index']);

Route::get('/services', function () {
    return view('services');
});