<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
    <main class="d-flex flex-nowrap" x-data="greetingState">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                <span class="fs-4">MercaditoGT</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{route('inicio')}}" class="nav-link active" aria-current="page">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="{{route('inicio')}}"/></svg>
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{route('index.generar_venta')}}" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="{{route('index.generar_venta')}}"/></svg>
                        POS
                    </a>
                </li>
                <li>
                    <a href="{{route('index.ventas')}}" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="{{route('index.ventas')}}"/></svg>
                        Ventas
                    </a>
                </li>
                <li>
                    <a href="{{route('ver.productos')}}" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                        Productos
                    </a>
                </li>
                <li>
                    <a href="{{route('ver.clientes')}}" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="{{route('ver.clientes')}}"/></svg>
                        Clientes
                    </a>
                </li>
                <li>
                    <a href="{{route('ver.tarjetas')}}" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="{{route('ver.tarjetas')}}"/></svg>
                        Tarjetas de Regalo
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
        <div class="b-example-divider b-example-vr"></div>
        <div class="container mt-5">
        {{ $slot }}
        </div>
    </main>
    </body>
</html>
