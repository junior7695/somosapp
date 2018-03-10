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

	<div class="container">
		<p>Bienvenidos a nuestra aplicacion utiliza la siguiente clave para ingresar al sistema: {{ $code }} 
		</p>
		<p>
			Recuerda que la misma sera util una sola vez.
		</p>
	</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/js/bsadmin.js') }}"></script>
</body>
</html>
