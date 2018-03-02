<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    
    <!-- Styles -->
    <style>
        html, body {
            font-family: 'Indie Flower', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .links > a {
            color: #212529;;
            padding: 0 25px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
       
         p{
            font-size: 100px;
            letter-spacing: .12rem;
            font-weight: 600;
            color: #891414b3;
            text-shadow: 2px 4px #001240;
            -moz-transition: all 1.5s ease;
            -ms-transition: all 1.2s ease;
            transition: all 1.6s ease;
            
         }
         p:hover{
            -moz-transform: scale(1.2);
            -webkit-transform: scale(1.2);
            -o-transform: scale(1.2);
            -ms-transform: scale(1.2);
            transform: scale(1.2);
        }


        
    </style>
</head>
<body>
    <div class="d-flex align-items-center fondo">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}" class="text-dark btn btn-outline-info btn-lg active">Pagina Principal</a>
                    @else
                        <a href="{{ route('key.index') }}" class="text-dark btn btn-outline-info btn-lg active">Entrar</a>
                       
                        @endauth
            </div>
        @endif

    <div class="container d-flex justify-content-center">
        
        <p>
            <b class="text-uppercase">Somos</b></a>Venezuela
        </p>

    </div>

            
    
    </div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
