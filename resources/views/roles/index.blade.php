@extends('home')

@section('principal')

<div class="container-fluid">


@if(session()->has('info'))
    <div class="alert alert-warning text-lead text-center mt-5" role="alert">{{ session('info') }}
    </div> 
@endif
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acción</th> 
                </tr>
            </thead>
            @foreach($roles as $role)
            <tbody>
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>
                        <div class="col row">
                    @can('roles.show')
                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-outline-primary">ver</a>
                    @endcan
                    @can('roles.edit')
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-warning mr-2 ml-2">editar</a>
                    @endcan
                    @can('roles.destroy')
                        <form action="{{ route('roles.destroy', $role->id) }}" method='POST'>

                        <input class="btn btn-outline-danger" type="submit" value="Eliminar">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        </form>
                    @endcan
                        </div>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    {!! $roles->render() !!}      
    </div>
</div>
@endsection