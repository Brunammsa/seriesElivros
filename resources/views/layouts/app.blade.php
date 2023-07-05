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
                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 100 100" width="50px" height="50px">
                            <path d="M19.5,95c-3.584,0-6.5-2.916-6.5-6.5V50.822C12.507,50.939,11.503,47,11,47c-1.209,0-1.973,0.635-3,0 c-1.929-1.192-3-0.231-3-2.5v-8c0-2.332,1.259-4.497,3.287-5.65l40.5-23.038c0.978-0.556,2.089-0.85,3.214-0.85 s2.236,0.294,3.214,0.851l40.5,23.038C97.741,32.003,99,34.168,99,36.5v8c0,2.269-1.152,4.336-3.083,5.529 C94.891,50.664,93.709,51,92.501,51c-0.504,0-1.009-0.06-1.501-0.177V88.5c0,3.584-2.916,6.5-6.5,6.5H19.5z" opacity=".35"/>
                            <path fill="#f2f2f2" d="M17.5,93c-3.584,0-6.5-2.916-6.5-6.5V48.822C10.507,48.939,10.003,49,9.5,49 c-1.209,0-2.391-0.336-3.418-0.971C4.152,46.836,3,44.769,3,42.5v-8c0-2.332,1.259-4.497,3.287-5.65l40.5-23.038 c0.978-0.556,2.089-0.85,3.214-0.85s2.236,0.294,3.214,0.851l40.5,23.038C95.741,30.003,97,32.168,97,34.5v8 c0,2.269-1.152,4.336-3.083,5.529C92.891,48.664,91.709,49,90.501,49c-0.504,0-1.009-0.06-1.501-0.177V86.5 c0,3.584-2.916,6.5-6.5,6.5H17.5z"/>
                            <polygon fill="#d9eeff" points="90.5,34.5 50,11.462 9.5,34.5 9.5,42.5 17.5,38.5 17.5,86.5 82.5,86.5 82.5,38.5 90.5,42.5"/>
                            <polygon fill="#ff7575" points="9.5,34.5 10,40.981 17.006,37.087 50,18.981 82.985,37.078 90,40.981 90.5,34.5 50,11.462"/>
                            <polygon fill="none" stroke="#40396e" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" points="90.5,34.5 50,11.462 9.5,34.5 9.5,42.5 17.5,38.5 17.5,86.5 82.5,86.5 82.5,38.5 90.5,42.5"/>
                            <polygon fill="#40396e" points="16,41 17.044,37.069 50,19 82.985,37.078 84,41 50,22.506" opacity=".35"/><rect width="62" height="10" x="19" y="75" fill="#70bfff" opacity=".35"/><rect width="26" height="35" x="37" y="50" fill="#ff7575"/>
                            <circle cx="56.5" cy="68.5" r="2.5" fill="#40396e"/>
                        </svg>
                    </a>
    
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" style="color: #FFF5E4;">Minhas coleções</a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{route("livros.index")}}">Livros</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="{{route("series.index")}}">Séries</a></li>
                            </ul>
                          </li>
                    </ul>
    
                    <div class="dropdown text-end">
                        <a href="#" class="d-block text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false" style="color: #FFF5E4;">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu text-small" style="">
                            <li><a class="dropdown-item" href="{{route("profile.edit")}}">Perfil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route("logout")}}">Sair</a>
                            </li>
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
