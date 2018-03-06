@extends('home')

@section('principal')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Rol</div>

                <div class="panel-body">                                        
                    <p><strong>Nombre</strong>     {{ $role->name }}</p>
                    <p><strong>Descripción</strong>  {{ $role->description }}</p>
                </div>
            </div>
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
                <tr>
                    <td>
                        <li>{{ $permission-> name }}
                        </li>
                    </td>
                </tr>
                @endforeach
                </ul>
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection