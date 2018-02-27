@extends('home')

@section('principal')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Usuarios</div>

                <div class="panel-body">                    
            <form action="{{ route('users.store') }}" method="POST">

                
                <h2>Crear nuevo Usuario</h2>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Nombre y apellido del Usuario" value="{{ old('name') }}">
                    <span class="help-block">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group">
                    <input type="int" name="ci" class="form-control" placeholder="Cedula de identidad sin caracteres especiales" value="{{ old('ci') }}">
                    <span class="help-block">{{ $errors->first('ci') }}</span>
                </div>
                <div class="form-group">
                    <input type="text" name="tlf" class="form-control" placeholder="numero telefonico sin caracteres especiales" value="{{ old('tlf') }}">
                    <span class="help-block">{{ $errors->first('tlf') }}</span>
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="all-access o not access" value="{{ old('email') }}">
                    <span class="help-block">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group">
                    <input type="text" name="institucion" class="form-control" placeholder="all-access o not access" value="{{ old('institucion') }}">
                    <span class="help-block">{{ $errors->first('institucion') }}</span>
                </div>
                <div class="form-group">
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Crear">
                </div>
                {{ csrf_field() }}
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection