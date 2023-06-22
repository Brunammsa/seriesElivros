<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Séries&Livros') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset("build/assets/icon6-96.ico")}}">
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    </head>
    <body class="antialiased">
                    
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <header class="p-3 mb-3 border-bottom" style="background-color: #DB005B;">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="{{route("dashboard")}}" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 -960 960 960" width="40">
                            <path d="M230.256-190.256h148.463V-432.82h202.562v242.564h148.463v-374.616L480-753.077l-249.744 188.12v374.701Zm-50.255 50.255v-449.998L480-815.767l299.999 225.768v449.998H531.026v-242.564H428.974v242.564H180.001ZM480-471.872Z"/>
                        </svg>
                    </a>
    
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li>
                            <a href="{{route("dashboard")}}" class="nav-link px-2"  style="color: #FFF5E4;">Minha coleção</a>
                        </li>
                    </ul>
    
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                    </form>
    
                    <div class="dropdown text-end">
                        <a href="#" class="d-block text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false" style="color: #FFF5E4;">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu text-small" style="">
                            <li><a class="dropdown-item" href="{{route("profile.edit")}}">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{route("logout")}}">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <main>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{ $slot }}
        </main>
    </body>
</html>
