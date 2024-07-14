<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigo Secreto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    @vite(['resources/js/validarCampos.js'])
</head>

<body>
    <nav class="navbar bg-dark border-bottom border-body py-3" data-bs-theme="dark">
        <div class="container">
            <div class="d-flex justify-content-evenly">
                <x-nav-link href="/">Home</x-nav-link>
                <x-nav-link href="/cadastro">Cadastrar pessoas</x-nav-link>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
