<div class="form-group">
	{{ Form::label('name', 'Ingresa Nombre y Apellido') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
	{{ Form::label('email', 'Correo Electronico') }}
	{{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
</div>
<div class="form-group">
	{{ Form::label('tlf', 'Numero Telefonico, preferiblemente movilnet') }}
	{{ Form::text('tlf', null, ['class' => 'form-control' , 'id' => 'tlf']) }}
</div>
@can('admin')
<div class="form-group">
	{{ Form::select('entidad', ['CANTV' => 'Compañía Anónima Nacional Teléfonos de Venezuela (CANTV)', 'SomosVenezuela' => 'Somos Venezuela', 'MPPS' => 'Ministerio del Poder Popular para la Salud (MPPS)', 'MVH' => 'Ministerio del Poder Popular para Hábitat y Vivienda (MVH)', 'CONAPDIS' => 'Consejo Nacional para las Personas con Discapacidad (CONAPDIS)', 'MPPA' => 'Ministerio del Poder Popular para la Alimentación (MPPA)'], 'entidad') }}
</div>
@endif
<hr>
<h3>Lista de Roles Para el <mark>Usuario</mark></h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($roles as $rol)
	    <li>
	        <label>
	        {{ Form::checkbox('roles[]', $rol->id, null) }}
	        {{ $rol->name }}
	        <em>({{ $rol->description }})</em>
	        </label>
	    </li>
	    @endforeach
    </ul>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-block btn-lg btn-outline-primary']) }}
</div>