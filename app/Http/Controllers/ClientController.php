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

public function create()
{
    return view('clients.create');
}

public function store(Request $request)
{
    // Validaciones
    $request->validate([
        'nombre' => 'required|string|max:100',
        'email' => 'required|email|unique:clients,email',
        'telefono' => 'nullable|string|max:30',
        'direccion' => 'nullable|string|max:255',
        
    ]);

    // Crear cliente
    Client::create([
        'nombre' => $request->nombre,
        'email' => $request->email,
        'telefono' => $request->telefono,
        'direccion' => $request->direccion,
    ]);

    return redirect()->route('clients.index')->with('success', 'Cliente creado correctamente.');
}


public function update(Request $request, Client $client)
{
    // Validaciones
    $request->validate([
        'nombre' => 'required|string|max:100',
        'email' => 'required|email|unique:clients,email,' . $client->id,
        'telefono' => 'nullable|string|max:30',
        'direccion' => 'nullable|string|max:255'
    ]);

    // Actualizar cliente
    $client->update([
        'nombre' => $request->nombre,
        'email' => $request->email,
        'telefono' => $request->telefono,
        'direccion' => $request->direccion
    ]);

    return redirect()->route('clients.index')->with('success', 'Cliente actualizado correctamente.');
}


public function edit(Client $client)
{
    return view('clients.edit', compact('client'));
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

public function destroy(Client $client)
{
    $client->delete();
    return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente eliminado correctamente.');
}
}