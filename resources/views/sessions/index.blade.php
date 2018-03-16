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
            @foreach($sessions as $session)
                @if($session->user_id === $user->id)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->tlf }}</td>
                    <td>{{ $user->entidad }}</td>
                    <td>
                        @can('sessions.endsession')
                            <form action="{{ route('sessions.endsession', $session->user_id) }}" method='POST'>

                            <input type="submit" value="Cerrar Sessión">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        </form>
                        @endcan
                    </td>
                </tr>
            @endif
                @endforeach 
            </tbody>
            @endforeach
        </table>
	
	<div class="container d-flex justify-content-center display-5">
		{{ $users->render() }}
		
	</div>
	</div>
	
</div>

@endsection