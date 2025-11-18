@extends('layouts.app')
@section('title','Crear Cliente')
@section('content')
<h3>Nuevo cliente</h3>

<form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
        @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label>Teléfono</label>
        <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
    </div>
    <div class="mb-3">
        <label>Dirección</label>
        <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">
    </div>
    <button class="btn btn-primary">Guardar</button>
    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection