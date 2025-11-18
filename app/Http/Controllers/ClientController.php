<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clientes = Client::all();
        return view('clients.index', compact('clientes'));
    }

public function verVentas($id)
{
    $token = "ACA_VA_EL_TOKEN_REAL";

    $url = "http://localhost/miapp_jwt/?route=ventas";

    $response = Http::withHeaders([
        'Authorization' => "Bearer $token"
    ])->get($url);

    if ($response->failed()) {
        return back()->with('error', 'Error al obtener ventas: ' . $response->body());
    }

    $ventas = $response->json();

    // filtrar por cliente_id
    $ventas = array_filter($ventas, function($v) use ($id) {
        return isset($v['cliente_id']) && $v['cliente_id'] == $id;
    });

    return view('clients.ventas', compact('ventas'));
}
}