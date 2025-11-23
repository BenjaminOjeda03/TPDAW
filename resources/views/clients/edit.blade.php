@extends('layouts.app')

@section('title','Editar Cliente')

@section('content')
<div class="container mt-4">

    <h3 class="mb-3">Editar cliente</h3>

    {{-- Mostrar errores de validación --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Mensajes de éxito / error --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('clients.update', $client) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text"
                   name="nombre"
                   class="form-control"
                   value="{{ old('nombre', $client->nombre) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   value="{{ old('email', $client->email) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input type="text"
                   name="telefono"
                   class="form-control"
                   value="{{ old('telefono', $client->telefono) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Dirección</label>
            <input type="text"
                   name="direccion"
                   class="form-control"
                   value="{{ old('direccion', $client->direccion) }}">
        </div>

        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
