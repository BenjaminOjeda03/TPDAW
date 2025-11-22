
<x-app-layout>
<div class="container mt-4">

    {{-- Título + botones --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Listado de Usuarios</h2>

        <div class="d-flex gap-2">
            <a href="{{ route('users.create') }}" class="btn btn-success">
                + Crear Usuario
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
                        <th>Apellido</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Perfil</th>
                       
                        <th class="text-center">Acciones</th>
        
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->nombre }}</td>
                            <td>{{ $user->apellido }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->telefono }}</td>
                            <td>{{ $user->perfil}}</td>

                            <td class="text-center">

    {{-- Botón Editar --}}
    <a href="{{ route('users.edit', $user) }}" 
       class="btn btn-warning btn-sm me-2">
        Editar
    </a>

    {{-- Botón Eliminar (con formulario DELETE) --}}
    <form action="{{ route('users.destroy', $user) }}" 
          method="POST" 
          class="d-inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm"
                onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
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
</x-app-layout>