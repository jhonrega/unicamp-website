<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client; // Importar el modelo

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all(); // Obtener todos los clientes desde la BD
        return view('about', compact('clients')); // Enviar los clientes a la vista
    }
}
