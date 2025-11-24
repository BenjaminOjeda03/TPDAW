<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class ClientController extends Controller
{    use AuthorizesRequests;
    public function index()
    {
        $this->authorize('viewAny', Client::class);
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

 public function create()
{
    if (auth()->user()->perfil !== 'Administrador') {
        return redirect()->route('clients.index')
            ->with('error', 'No tenés permiso para crear clientes.');
    }

    return view('clients.create');
}

public function store(Request $request)
{
    if (auth()->user()->perfil !== 'Administrador') {
        return redirect()->route('clients.index')
            ->with('error', 'No tenés permiso para crear clientes.');
    }

    $request->validate([
        'nombre' => 'required|string|max:100',
        'email' => 'required|email|unique:clients,email',
        'telefono' => 'nullable|string|max:30',
        'direccion' => 'nullable|string|max:255',
    ]);

    Client::create([
        'nombre' => $request->nombre,
        'email' => $request->email,
        'telefono' => $request->telefono,
        'direccion' => $request->direccion,
    ]);

    return redirect()->route('clients.index')->with('success', 'Cliente creado correctamente.');
}


    public function edit(Client $client)
    {
        // ⛔️ SOLO Administrador puede editar
        if (auth()->user()?->perfil !== 'Administrador') {
            return redirect()->route('dashboard')
                ->with('error', 'No sos administrador, no podés editar clientes.');
        }

        return view('clients.edit', compact('client'));
    }


    public function update(Request $request, Client $client)
    {
        // Verificar permisos
        if (auth()->user()?->perfil !== 'Administrador') {
            return redirect()->route('dashboard')
                ->with('error', 'No tienes permisos para actualizar clientes.');
        }

        // Validaciones
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'telefono' => 'nullable|string|max:30',
            'direccion' => 'nullable|string|max:255',
        ]);

        // Actualizar cliente
        $client->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
        ]);

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado correctamente.');
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
        $ventas = array_filter($ventas, fn($v) =>
            isset($v['cliente_id']) && $v['cliente_id'] == $id
        );

        return view('clients.ventas', compact('ventas'));
    }


    public function destroy(Client $client)
    {
        // Verificar permisos
        if (auth()->user()?->perfil !== 'Administrador') {
            return redirect()->route('dashboard')
                ->with('error', 'No tienes permisos para eliminar clientes.');
        }

        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente eliminado correctamente.');
    }
}