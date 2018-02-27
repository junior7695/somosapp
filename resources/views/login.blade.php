<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Jaime Daniel Vallejo">
	<meta name="description" content="...">
	<meta name="keywords" content="...">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset("assets/css/Style.css") }}">
	<title>Login</title>
</head>
<body>
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="{{ asset("assets/images/avatar.png") }}" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="{{ route('login.store') }}" method="POST">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" class="form-control" placeholder="Ingresa Correo" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Recordar Sesión
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Iniciar Sesión</button>
                {{--<input type="hidden" name="token" value="{{ csrf_token() }}">--}}
                {{ csrf_field() }}
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                ¿Olvido su contraseña?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>