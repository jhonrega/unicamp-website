<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $projects = DB::table('projects')->latest()->take(5)->get();
    return view('welcome', compact('projects'));
});

Route::get('/about', function () {
    return view('about');
});
