<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('', 'SomosVenezuela') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/fontawesome-all.min.css') }}" rel="stylesheet">
    
</head>
<body>
    <div class="">
        <img src="{{ asset('img/top.png') }}" alt="Responsive image" class="img-fluid">
    </div>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-nav">
        <div class="container">
             <a class="sidebar-toggle text-light mr-3 text-dark"><i class="fas fa-angle-double-down fa-2x"></i></a>

            <a class="navbar-brand text-dark" href="{{ url('/') }}">
               <b>Somos</b>Venezuela
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

                <ul class="navbar-nav">
                    @if (Auth::guest())
                        <li class="nav-item"><a href="{{ route('key.index') }}" class="nav-link text-dark text-center"><b>ENTRAR</b></a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-dark text-center text-capitalize text-light" id="navbarDropdownMenuLink" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-2x mr-1"></i>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a href="{{ route('logout') }}" 
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item text-capitalize text-center">
                                    Salir
                                </a>
    
                                <a href="{{ route('users.perfil', Auth::user()->id) }}" 
                                    class="dropdown-item text-capitalize text-center">
                                    Perfil
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </nav>

    @yield('content')
</div>
@yield('footer')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/js/bsadmin.js') }}"></script>
</body>
</html>
