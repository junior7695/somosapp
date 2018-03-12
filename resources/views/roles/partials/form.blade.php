<div class="form-group">
	{{ Form::label('name', 'Nombre del Rol') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
	{{ Form::label('slug', 'Sección de Permisos') }}
	{{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
	{{ Form::label('description', 'Descripción de lo que hace el ROL') }}
	{{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>
@can('admin')
<hr>
<h3>Permiso especial</h3>
<div class="form-group">
 	<label class="form-check-label">{{ Form::radio('special', 'all-access') }} Acceso total</label>
 	<label>{{ Form::radio('special', 'no-access') }} Ningún acceso</label>
 	<label>{{ Form::radio('special', '') }}Dependiendo del Rol</label>
</div>
@endcan
<hr>
<h3>Lista de Permisos Para el <mark>Rol</mark></h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($permissions as $permission)
	    <li>
	        <label>
	        {{ Form::checkbox('permissions[]', $permission->id, null) }}
	        {{ $permission->name }}
	        <em>({{ $permission->description }})</em>
	        </label>
	    </li>
	    @endforeach
    </ul>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-block btn-lg btn-outline-primary']) }}
</div>