<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
    // Crear usuario
    User::create([
        'name' => $request->name,
        'email' => $request->email,
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed'
        ]);

        // Actualizar usuario
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
        
    }

    public function edit(string $id)
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
