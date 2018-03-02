@extends('home')

@section('principal')
<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Acción</th>
		</tr>
		@foreach($users as $user)
			<tr>
				<td>{{ $user->id}}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->tlf}}</td>
				<td>
					<div class="row">
					
						<a href="{{ route('users.edit', $user->id ) }}" class="btn btn-outline-warning mr-2"> Editar</a>

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
@endsection