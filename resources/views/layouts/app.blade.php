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

            <!--Side Menu--->
            <div class="col-md-2">
                <div class="card" style="width: 13rem;">
                    <div class="card-body m-0 p-0">

                        <div class="hov">
                            <a href="{{url('/dashboard')}}" class="list-group-item d-flex justify-content-left align-items-center pt-3 pb-3 pr-3">
                                <span class="material-symbols-outlined" style="margin-left: 20px;">
                                    grid_view
                                </span>
                                <p class="text-secondary m-0 p-0">Dashboard</p>
                                <span class="badge text-bg-danger rounded-pill">14</span>
                            </a>
                        </div>

                        <div class="hov">
                            <a href="{{url('/product')}}" class="list-group-item d-flex justify-content-left align-items-center pt-3 pb-3 pr-3">
                                <span class="material-symbols-outlined" style="margin-left: 20px;">
                                    deployed_code
                                </span>
                                <p class="text-secondary m-0 p-0">Product</p>
                                <span class="badge text-bg-danger rounded-pill">2</span>
                            </a>
                        </div>

                        <div class="hov">
                            <a href="{{url('/inventory')}}" class="list-group-item d-flex justify-content-left align-items-center pt-3 pb-3 pr-3">
                                <span class="material-symbols-outlined" style="margin-left: 20px;">
                                    inventory
                                </span>
                                <p class="text-secondary m-0 p-0">Inventory</p>
                                <span class="badge text-bg-danger rounded-pill">1</span>
                            </a>
                        </div>

                        <div class="hov">
                        <a href="{{url('/warehouse')}}" class="list-group-item d-flex justify-content-left align-items-center pt-3 pb-3 pr-3">
                            <span class="material-symbols-outlined" style="margin-left: 20px;">
                                location_on
                            </span>
                            <p class="text-secondary m-0 p-0">Warehouse</p>
                            <span class="badge text-bg-danger rounded-pill">1</span>
                        </a>
                        </div>

                        <div class="hov">
                        <a href="{{url('/stock')}}" class="list-group-item d-flex justify-content-left align-items-center pt-3 pb-3 pr-3">
                            <span class="material-symbols-outlined" style="margin-left: 20px;">
                                my_location
                            </span>
                            <p class="text-secondary m-0 p-0">Stock</p>
                            <span class="badge text-bg-danger rounded-pill">1</span>
                        </a>
                        </div>

                        <div class="hov">
                        <a href="{{url('/supplier')}}" class="list-group-item d-flex justify-content-left align-items-center pt-3 pb-3 pr-3">
                            <span class="material-symbols-outlined" style="margin-left: 20px;">
                                account_circle
                            </span>
                            <p class="text-secondary m-0 p-0">Supplier</p>
                            <span class="badge text-bg-danger rounded-pill">1</span>
                        </a>
                        </div>

                           <div class="hov">
                        <a href="{{url('/invoice')}}" class="list-group-item d-flex justify-content-left align-items-center pt-3 pb-3 pr-3">
                            <span class="material-symbols-outlined" style="margin-left: 20px;">
                                receipt_long
                            </span>
                            <p class="text-secondary m-0 p-0">Invoice</p>
                            <span class="badge text-bg-danger rounded-pill">1</span>
                        </a>
                           </div>

                           <div class="hov">
                        <a href="{{url('/user')}}" class="list-group-item d-flex justify-content-left align-items-center pt-3 pb-3 pr-3 ">
                            <span class="material-symbols-outlined" style="margin-left: 20px;">
                                groups
                            </span>
                            <p class="text-secondary m-0 p-0">User Management</p>
                            <span class="badge text-bg-danger rounded-pill">1</span>
                        </a>
                           </div>


                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>