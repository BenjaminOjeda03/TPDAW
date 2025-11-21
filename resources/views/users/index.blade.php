<?php
//      HACER QUE ESTE FORMULARIO SIRVA PARA CREAR USUARIOS

?>

@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- Título + botones --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Listado de Clientes</h2>

        <div class="d-flex gap-2">
            <a href="{{ route('ventas.index') }}" class="btn btn-outline-primary">
                Ver todas las ventas
            </a>

            <a href="{{ route('clients.create') }}" class="btn btn-success">
                + Crear Cliente
            </a>
        </div>
    </div>

    {{-- Mensaje de error --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Mensaje de éxito --}}
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


    {{-- Tabla --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->telefono }}</td>

                            <td class="text-center">

    {{-- Botón Editar --}}
    <a href="{{ route('clients.edit', $cliente) }}" 
       class="btn btn-warning btn-sm me-2">
        Editar
    </a>

    {{-- Botón Eliminar (con formulario DELETE) --}}
    <form action="{{ route('clients.destroy', $cliente) }}" 
          method="POST" 
          class="d-inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm"
                onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">
            Eliminar
        </button>
    </form>

</td>


                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection