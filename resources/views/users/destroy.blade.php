
@section('title', 'Eliminar Usuario')

<x-app-layout>
<h3>¿Seguro que deseas eliminar este usuario?</h3>

<p><strong>Nombre:</strong> {{ $user->nombre }}</p>
<p><strong>Apelldio:</strong> {{ $user->apellido }}</p>
<p><strong>Username:</strong> {{ $user->username }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Teléfono:</strong> {{ $user->telefono }}</p>
<p><strong>Perfil:</strong> {{ $user->perfil }}</p>
<p><strong>Password:</strong> {{ $user->password }}</p>

<form action="{{ route('users.destroy', $user->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <button class="btn btn-danger"
        onclick="return confirm('¿Eliminar este usuario definitivamente?')">
        Sí, eliminar
    </button>

    <a href="{{ route('users.index') }}" class="btn btn-secondary">
        Cancelar
    </a>
</form>
</x-app-layout>
