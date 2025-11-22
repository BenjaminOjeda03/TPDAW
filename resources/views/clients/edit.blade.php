
@section('title','Editar Cliente')
<x-app-layout>
<h3>Editar cliente</h3>

<form action="{{ route('clients.update', $client) }}" method="POST">
    @csrf 
    @method('PUT')
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $client->nombre) }}">
        @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $client->email) }}">
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label>Teléfono</label>
        <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $client->telefono) }}">
    </div>
    <div class="mb-3">
        <label>Dirección</label>
        <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $client->direccion) }}">
    </div>
    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Volver</a>
</form>
</x-app-layout>