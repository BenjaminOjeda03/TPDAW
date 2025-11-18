<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VentasController extends Controller
{
    public function index()
    {
        $token = session('jwtToken');

        if (!$token) {
            return "No hay token en la sesión";
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get('http://localhost/miapp_jwt/api/ventas');

        return $response->json();
    }
}