@extends('home')

@section('principal')
	@if (session()->has('status'))
    <div class="container alert-success text-center text-uppercase w-50 py-4" role="alert">
    {{ session('status') }}
    </div>
    @endif 
<div class="container-fluid">
	<div class="row table-responsive-sm">
		<table class="table table-striped table-bordered">
		<tr>
			<th class="d-none d-sm-block">ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Acción</th>
		</tr>
		@foreach($users as $user)
			<tr>
				<td class="d-none d-sm-block">{{ $user->id}}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->tlf}}</td>
				<td>
					<div class="row">
					
						<a href="{{ route('users.edit', $user->id ) }}" class="btn btn-outline-warning mx-2"> Editar</a>

					<form action="{{ route("users.destroy", $user->id) }}" method="POST">

		             <input class="btn btn-outline-danger" type="submit" value="Elminiar">
						
						{{ method_field('DELETE') }}
						{{ csrf_field() }}
					</form>
				
					</div>
					
					
				</td>
			</tr>
		@endforeach
	</table>
	
	<div class="container d-flex justify-content-center display-5">
		{{ $users->render() }}
		
	</div>
	</div>
	
</div>

@endsection