@extends('crear.master-crear')

@section('content')
@if (session()->has('status'))
	<div class="alert alert-succes">{{ session('status') }}</div>
@endif
	<h2>Todos los Usuarios</h2>
	<p>
		<a href="{{ route('crear.create') }}" class="btn btn-primary">Crear nuevo usuario</a>
	</p>
	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Entidad</th>
			<th>Fecha de Creacion</th>
			<th>Fecha de Modificación</th>
			<th>Acciones</th>
		</tr>
		
		@foreach ($creart as $crear)

		<tr>
			<td>{{ $crear->id }}</td>
			<td> {{ $crear->nombre }}</td>
			<td>{{ $crear->correo }}</td>
			<td>{{ $crear->entidad }}</td>
			<td>{{ $crear->created_at }}</td>
			<td>{{ $crear->updated_at }}</td>
			<td>
				<a href="{{ route('crear.edit', $crear->id) }}">Editar</a>
				<form action="{{ route('crear.destroy', $crear->id) }}" method='POST'>

				<input class="btb btn-primary" type="submit" value="Eliminar">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				</form>
			</td>
		</tr>

		@endforeach

	</table>


@endsection