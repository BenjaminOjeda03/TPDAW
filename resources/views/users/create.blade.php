
@section('title','Crear Usuario')
<x-app-layout>
<h3>Nuevo usuario</h3>



<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
        @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label>Apellido</label>
        <input type="text" name="apellido" class="form-control" value="{{ old('apellido') }}">
        @error('apellido') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label>Nombre de usuario</label>
        <input type="text" name="nombre_usuario" class="form-control" value="{{ old('nombre_usuario') }}">
        @error('nombre_usuario') <small class="text-danger">{{ $message }}</small> @enderror
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
        <label>Perfil</label>
        <input type="text" name="perfil" class="form-control" value="{{ old('perfil') }}">
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" >
    </div>
    <div class="mb-3">
    <label>Confirmar Password</label>
    <input type="password" name="password_confirmation" class="form-control" >
</div>

    <button class="btn btn-primary">Guardar</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
</form>
</x-app-layout>