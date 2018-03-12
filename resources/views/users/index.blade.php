@extends('home')

@section('principal')
	@if(session()->has('info'))
    <div class="alert alert-warning text-lead text-center mt-5" role="alert">{{ session('info') }}
    </div> 
    @endif
<div class="container-fluid">
	<div class="row table-responsive-sm">
		<table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Organización a la que Pertenece</th>
                    <th>Acción</th> 
                </tr>
            </thead>
            @foreach($users as $user)
            <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->tlf }}</td>
                    <td>{{ $user->entidad }}</td>
                    <td>
                        <div class="col row">
                    @can('users.show')
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-primary">ver</a>
                    @endcan
                    @can('users.edit')
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-warning mr-2 ml-2">editar</a>
                    @endcan
                    @can('users.destroy')
                        <form action="{{ route('users.destroy', $user->id) }}" method='POST'>

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
	
	<div class="container d-flex justify-content-center display-5">
		{{ $users->render() }}
		
	</div>
	</div>
	
</div>

@endsection