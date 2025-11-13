<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function show($clientId)
    {
        $jwtToken = env('EXTERNAL_JWT_TOKEN');
        $url = env('EXTERNAL_API_URL') . "/clientes/{$clientId}/ventas";

        $response = Http::withToken($jwtToken)->get($url);

        if ($response->failed()) {
            return back()->withErrors('No se pudieron obtener las ventas del cliente.');
        }

        $ventas = $response->json();

        return view('clients.ventas', compact('ventas'));
    }
}
