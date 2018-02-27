@extends('crear.master-crear')

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-5">
			<form action="{{ route('crear.update',$crear->id) }}" method="POST">
				@if (session()->has('status'))
					<div class="alert alert-succes">{{ session('status') }}</div>
				@endif
				
        		<h2>Editar usuario #{{ $crear->id }}</h2>
        		<div class="form-group">
        			<input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ old('nombre') ?? $crear->nombre }}">
        			<span class="help-block">{{ $errors->first('nombre') }}</span>
        		</div>
        		<div class="form-group">
        			<input type="text" name="correo" class="form-control" placeholder="Correo" value="{{ old('correo') ?? $crear->correo }}">
        			<span class="help-block">{{ $errors->first('correo') }}</span>
        		</div>
        		<div class="form-group">
        			<input type="text" name="entidad" class="form-control" placeholder="Entidad" value="{{ old('entidad') ?? $crear->entidad }}">
        			<span class="help-block">{{ $errors->first('entidad') }}</span>
        		</div>
        		<div class="form-group">
        		<input class="btn btn-lg btn-primary btn-block" type="submit" value="Editar">
        		</div>
        		{{ csrf_field() }}
        		{{ method_field('PUT') }}
  			</form>		
		</div>
    </div><!-- /card-container -->

@endsection