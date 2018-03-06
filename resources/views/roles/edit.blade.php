@extends('home')

@section('principal')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Roles</div>

                <div class="panel-body">                    
                    <form action="{{ route('roles.update',$role->id) }}" method="POST">
                
                <h2>Editar Rol "{{ $role->name }}"</h2>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Nombre del Rol" value="{{ old('name') ?? $role->name }}">
                    <span class="help-block">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group">
                    <input type="text" name="slug" class="form-control" placeholder="Seccion del rol" value="{{ old('slug') ?? $role->slug }}">
                    <span class="help-block">{{ $errors->first('slug') }}</span>
                </div>
                <div class="form-group">
                    <input type="text" name="description" class="form-control" placeholder="Descripcion del Rol" value="{{ old('description') ?? $role->description }}">
                    <span class="help-block">{{ $errors->first('description') }}</span>
                </div>
                <div class="form-group">
                    <input type="text" name="special" class="form-control" placeholder="all-access o not-access" value="{{ old('special') ?? $role->special }}">
                    <span class="help-block">{{ $errors->first('special') }}</span>
                </div>
                <div class="form-group">
                    <table class="table table-striped table-hover">
            <thead>
                            <tr>
                                <th>Permisos</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
            </thead>
            <tbody>
                <ul>
                @foreach($permissions as $permission)
                <input type="checkbox" class="form" name="permissions[]" value="{{ $permission->id }}">{{ $permission->name }}<br>
                @endforeach
                </ul>
            </tbody>
            </table>
                </div>
                <div class="form-group">
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Editar">
                </div>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection