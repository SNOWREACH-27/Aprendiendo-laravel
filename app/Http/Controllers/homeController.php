<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    // para rutas con un solo método se usa el invoke que permite solo una ruta
    public function __invoke()
    {
        return view('home');
    } 
}
