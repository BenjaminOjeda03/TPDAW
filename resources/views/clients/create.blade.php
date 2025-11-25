@extends('layouts.app')

@section('title','Crear Cliente')

@section('content')
<h3>Nuevo cliente</h3>

<form action="{{ route('clients.store') }}" method="POST">
    @csrf

    {{-- Nombre --}}
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre"
               type="text"
               name="nombre"
               class="form-control @error('nombre') is-invalid @enderror"
               value="{{ old('nombre') }}"
               required
               maxlength="100">
        @error('nombre')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Email --}}
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email"
               type="email"
               name="email"
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email') }}"
               required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Teléfono --}}
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input id="telefono"
               type="text"
               name="telefono"
               class="form-control @error('telefono') is-invalid @enderror"
               value="{{ old('telefono') }}"
               maxlength="30">
        @error('telefono')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Dirección --}}
    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección</label>
        <input id="direccion"
               type="text"
               name="direccion"
               class="form-control @error('direccion') is-invalid @enderror"
               value="{{ old('direccion') }}"
               maxlength="255">
        @error('direccion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Botones --}}
    <button class="btn btn-primary">Guardar</button>
    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
