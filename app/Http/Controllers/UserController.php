<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        'nombre_usuario' => 'required|string|max:255|unique:users,nombre_usuario',
        'email' => 'required|string|email|max:255|unique:users,email',
        'telefono' => 'nullable|string|max:20',
        'perfil' => 'required|string|max:50',
        'password' => 'required|string|min:8|confirmed',
        ]);
    // Crear usuario
    User::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'nombre_usuario' => $request->nombre_usuario,
        'email' => $request->email,
        'telefono' => $request->telefono,
        'perfil' => $request->perfil,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
}

    
    /*public function show(string $id)
    {
        //}
     */



public function update(Request $request, User $user)
{
    // Validaciones
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'nombre_usuario' => 'required|string|max:255|unique:users,nombre_usuario,' . $user->id,
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'telefono' => 'nullable|string|max:20',
        'perfil' => 'required|string|max:50',
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    // Actualizar usuario
    $user->update([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'nombre_usuario' => $request->nombre_usuario,
        'email' => $request->email,
        'telefono' => $request->telefono,
        'perfil' => $request->perfil,
        'password' => $request->password ? bcrypt($request->password) : $user->password,
    ]);

    // Si el usuario actual se cambió a Consultas, redirigir al dashboard
    if (auth()-> $request->perfil !== 'Administrador') {
        return redirect()->route('dashboard')
                         ->with('success', 'Tu perfil ha cambiado. Has sido redirigido al dashboard.');
    }

    // De lo contrario, volver al listado de usuarios
    return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
}



    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function destroy(User $user)
    {
         $user->delete();
    return redirect()
            ->route('users.index')
            ->with('success', 'Usuario eliminado correctamente.');

    }
}
