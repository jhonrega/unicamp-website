<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        // 1. Obtener los productos de la base de datos
        $products = \App\Models\Product::all();

        // 2. Retornar la vista 'products' con la colección de productos
        return view('products', compact('products'));

        if (!Storage::exists('public/pdfs/catalogo_productos.pdf')) {
            dd('El archivo no existe en storage/app/public/pdfs/');
        }
    }

}
