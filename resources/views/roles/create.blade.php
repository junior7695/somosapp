@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Roles</div>

                <div class="panel-body">                    
            <form action="{{ route('roles.store') }}" method="POST">

                
                <h2>Crear nuevo Rol</h2>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Nombre del Rol" value="{{ old('name') }}">
                    <span class="help-block">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group">
                    <input type="text" name="slug" class="form-control" placeholder="Seccion a dar permisos" value="{{ old('slug') }}">
                    <span class="help-block">{{ $errors->first('slug') }}</span>
                </div>
                <div class="form-group">
                    <input type="text" name="description" class="form-control" placeholder="descripcion del rol" value="{{ old('description') }}">
                    <span class="help-block">{{ $errors->first('description') }}</span>
                </div>
                <div class="form-group">
                    <input type="text" name="special" class="form-control" placeholder="all-access o not access" value="{{ old('special') }}">
                    <span class="help-block">{{ $errors->first('special') }}</span>
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