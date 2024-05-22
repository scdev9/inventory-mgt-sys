<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inventory Management') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <!--@vite(['resources/css/app.css', 'resources/js/app.js'])-->
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
            <link rel="stylesheet" href="{{ mix('css/app.css') }}">
            <!--Bootstrap css----->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </x-slot>
            
            <div class="col-md-2">
                <ul class="list-group">
                    <a href="{{url('/dashboard')}}" class="list-group-item d-flex justify-content-between align-items-center">
                        Dashboard
                        <span class="badge text-bg-danger rounded-pill">14</span>
                    </a>
                    <a href="{{url('/product')}}" class="list-group-item d-flex justify-content-between align-items-center">
                        Product
                        <span class="badge text-bg-danger rounded-pill">2</span>
                    </a>
                    <a href="{{url('/inventory')}}" class="list-group-item d-flex justify-content-between align-items-center">
                        Inventory
                        <span class="badge text-bg-danger rounded-pill">1</span>
                    </a>
                </ul>
            </div>
        </main>
    </div>
</body>

</html>