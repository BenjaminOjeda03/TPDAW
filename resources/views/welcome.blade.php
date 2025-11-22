<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestión de Clientes</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-gray-100 text-black">

    <!-- HEADER (color más oscuro) -->
    <header class="bg-gray-800 text-white py-4 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">

            <!-- Logo -->
            <h1 class="text-xl font-bold">Gestión</h1>

            <!-- Navegación -->
            @if (Route::has('login'))
                <nav class="flex space-x-4">

                    @auth
                        <!-- Botón Dashboard -->
                        <a href="{{ url('/dashboard') }}"
                           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                           Dashboard
                        </a>

                    @else
                        <!-- Botón Login -->
                        <a href="{{ route('login') }}"
                           class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                           Iniciar Sesión
                        </a>

                        <!-- Botón Register -->
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="px-4 py-2 bg-yellow-600 text-white rounded-md hover:bg-yellow-700 transition">
                               Registrarse
                            </a>
                        @endif

                    @endauth

                </nav>
            @endif
        </div>
    </header>

    <!-- BODY -->
    <main class="flex-grow flex flex-col items-center justify-center text-center px-4">

        <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png"
             class="w-32 h-32 mb-6 opacity-90">

        <h2 class="text-3xl font-bold mb-4">Bienvenido al Sistema de Gestión</h2>

        <p class="text-lg max-w-xl text-gray-700">
            Administra usuarios, clientes y ventas de una forma rápida, ordenada y eficiente.
        </p>

    </main>

    <!-- FOOTER (color distinto al header y al body) -->
    <footer class="bg-gray-800 text-white py-4 shadow-lg">
        <div class="text-center text-sm opacity-90">
            © {{ date('Y') }} Sistema de Gestión — Todos los derechos reservados
        </div>
    </footer>

</body>
</html>
