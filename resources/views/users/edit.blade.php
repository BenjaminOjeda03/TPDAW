@extends('layouts.app')
@section('title','Editar Usuario')

@section('content')
<h3>Editar usuario</h3>

<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $user->nombre) }}">
        @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Apellido</label>
        <input type="text" name="apellido" class="form-control" value="{{ old('apellido', $user->apellido) }}">
        @error('apellido') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Nombre de usuario</label>
        <input type="text" name="nombre_usuario" class="form-control" value="{{ old('nombre_usuario', $user->nombre_usuario) }}">
        @error('nombre_usuario') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Teléfono</label>
        <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $user->telefono) }}">
    </div>

    <div class="mb-3">
    <label>Perfil</label>
    <select name="perfil" class="form-control">
        <option value="Administrador" {{ old('perfil', $user->perfil) == 'Administrador' ? 'selected' : '' }}>
            Administrador
        </option>
        <option value="Gestión" {{ old('perfil', $user->perfil) == 'Gestión' ? 'selected' : '' }}>
            Gestión
        </option>
        <option value="Consultas" {{ old('perfil', $user->perfil) == 'Consultas' ? 'selected' : '' }}>
            Consultas
        </option>
    </select>

    @error('perfil')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Dejar en blanco para no cambiar">
    </div>

    <div class="mb-3">
        <label>Confirmar Password</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <button class="btn btn-primary">Guardar</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>

</form>
@endsection