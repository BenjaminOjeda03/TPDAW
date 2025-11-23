<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Listado de usuarios
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Formulario de creación
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Guardar nuevo usuario
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'          => 'required|string|max:255',
            'apellido'        => 'required|string|max:255',
            'nombre_usuario'  => 'required|string|max:255|unique:users,nombre_usuario',
            'email'           => 'required|string|email|max:255|unique:users,email',
            'telefono'        => 'nullable|string|max:20',
            'perfil'          => 'required|string|in:Administrador,Gestión,Consultas',
            'password'        => 'required|string|min:8|confirmed',
        ], [
            'email.unique' => 'El email ya existe en el sistema.',
            'nombre_usuario.unique' => 'El nombre de usuario ya está en uso.',
        ]);

        User::create([
            'nombre'          => $request->nombre,
            'apellido'        => $request->apellido,
            'nombre_usuario'  => $request->nombre_usuario,
            'email'           => $request->email,
            'telefono'        => $request->telefono,
            'perfil'          => $request->perfil,
            'password'        => bcrypt($request->password),
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuario creado correctamente.');
    }


    /**
     * Formulario de edición
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    /**
     * Actualizar usuario
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nombre'          => 'required|string|max:255',
            'apellido'        => 'required|string|max:255',
            'nombre_usuario'  => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'nombre_usuario')->ignore($user->id)
            ],
            'email'           => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id)
            ],
            'telefono'        => 'nullable|string|max:20',
            'perfil'          => 'required|string|in:Administrador,Gestión,Consultas',
            'password'        => 'nullable|string|min:8|confirmed',
        ], [
            'email.unique' => 'El email ya existe en el sistema.',
            'nombre_usuario.unique' => 'El nombre de usuario ya está en uso.',
        ]);

        // Actualizar
        $user->update([
            'nombre'          => $request->nombre,
            'apellido'        => $request->apellido,
            'nombre_usuario'  => $request->nombre_usuario,
            'email'           => $request->email,
            'telefono'        => $request->telefono,
            'perfil'          => $request->perfil,
            'password'        => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        // Si el usuario modificado es el logeado y dejó de ser Admin → redirigir
        if (auth()->user()->id === $user->id && $request->perfil !== 'Administrador') {
            return redirect()
                ->route('dashboard')
                ->with('success', 'Tu perfil ha cambiado. Has sido redirigido al dashboard.');
        }

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }


    /**
     * Eliminar usuario
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
}
