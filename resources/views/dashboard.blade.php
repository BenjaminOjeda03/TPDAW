<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

            {{-- Logged-in user --}}
            <p>Logged in as: {{ auth()->user()->nombre }} {{ auth()->user()->apellido }} ({{ auth()->user()->perfil }})</p>

            {{-- Client management --}}
            <div class="mb-4">
                <a href="{{ route('clients.index') }}"
                   class="block p-4 bg-blue-500 text-black rounded-lg shadow hover:bg-blue-600">
                    📁 Client Management
                </a>
            </div>

            {{-- User management (only Administrators) --}}
            @if(auth()->user()->perfil === 'Administrador')
                <div class="mb-4">
                    <a href="{{ route('users.index') }}"
                       class="block p-4 bg-green-600 text-black rounded-lg shadow hover:bg-green-700">
                        👥 User Management
                    </a>
                </div>
                @else
                <p>No tienes el permiso de administrador</p>
            @endif

        </div>
    </div>
</x-app-layout>
