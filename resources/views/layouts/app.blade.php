<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Laravel')</title>

    <!-- Bootstrap o Tailwind (lo que uses) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen">

        <!-- Navbar si la tenés -->
        <livewire:layout.navigation />

        <div class="container py-4">
            @yield('content')
        </div>
    </div>

</body>
</html>