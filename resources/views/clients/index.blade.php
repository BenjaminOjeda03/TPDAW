@extends('layouts.app')

@section('title', 'Listado de Clientes')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Listado de Clientes</h2>

        <div class="d-flex gap-2">
            <a href="{{ route('clients.create') }}" class="btn btn-success">
                + Crear Cliente
            </a>
        </div>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <table class="table table-striped mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Fecha de Alta</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->nombre }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->telefono }}</td>
                        <td>{{ $client->direccion }}</td>

                        <!-- FECHA DE ALTA SOLO DÍA/MES/AÑO -->
                        <td>{{ $client->created_at->format('d/m/Y') }}</td>

                        <td class="text-center">
                            <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning btn-sm me-2">Editar</a>

                            <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">
                                        Eliminar
                                </button>


                                     <a href="{{ route('ventas.index') }}" class="btn btn-outline-primary">
                Ver Ventas
            </a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection