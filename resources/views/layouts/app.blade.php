<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp" rel="stylesheet" />
    <title>Pondok Dukcapil Tapin</title>
    <link rel="icon" type="image/png" href="{{ asset('icon/logo.png') }}">
    @vite('resources/css/app.css')
    @vite(['resources/js/app.js'])
    @stack('styles')
</head>

<body class="bg-cover bg-center" style="background-image: url('{{ asset('images/bg.jpg') }}');">
    <div class="min-h-screen">
        @yield('content')
    </div>

    <!-- Footer Nav -->
    @include('layouts.partials.footer-nav')

    <!-- Scripts (Harus di akhir body) -->
    @stack('scripts')
</body>
</html>