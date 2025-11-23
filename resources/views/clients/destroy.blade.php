
@extends('layouts.app')

@section('title', 'Eliminar Cliente')

@section('content')
<h3>¿Seguro que deseas eliminar este cliente?</h3>

<p><strong>Nombre:</strong> {{ $client->nombre }}</p>
<p><strong>Email:</strong> {{ $client->email }}</p>
<p><strong>Teléfono:</strong> {{ $client->telefono }}</p>
<p><strong>Dirección:</strong> {{ $client->direccion }}</p>

<form action="{{ route('clients.destroy', $client->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <button class="btn btn-danger"
        onclick="return confirm('¿Eliminar este cliente definitivamente?')">
        Sí, eliminar
    </button>

    <a href="{{ route('clients.index') }}" class="btn btn-secondary">
        Cancelar
    </a>
</form>
@endsection