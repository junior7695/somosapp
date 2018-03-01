@extends('home')

@section('principal')

    
    @if (session()->has('status'))
    <div class="container alert-success text-center text-uppercase w-50" role="alert">
    {{ session('status') }}
    </div>
    @endif  
    
    
	<div class="container mb-5">
  		<h1 class="text-center text-muted">Editar {{ $user->name }}</h1>
  		
      <div class="row d-flex justify-content-center">
  			<div class="col-md-6">
  				<form action="{{ route('users.update', $user->id) }}" method="POST">
           <div class="form-group">
             <label for="name">Nombre</label>
             <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Nombre" value="{{ old('name') }}">{{ $errors->first('name') }}
             <small id="nameHelp" class="form-text text-muted">Ingresa Nombre y Apellido</small>
          </div>

           <div class="form-group">
             <label for="exampleInputEmail1">Email</label>
             <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa Correo" value="{{ old('email') }}">{{ $errors->first('email') }}
             <small id="emailHelp" class="form-text text-muted">Tiene que ser un Email valido</small>
          </div>
          <div class="form-group">
             <label for="tlf">Telefono</label>
             <input type="text" name="tlf" class="form-control" id="tlf" aria-describedby="tlfHelp" placeholder="Telefono" value="{{ old('tlf') }}"> {{ $errors->first('tlf') }}
             <small id="tlfHelp" class="form-text text-muted">Usa Movilnet </small>
          </div>
          
        <input type="submit" class="btn btn-outline-danger btn-block" value="Editar">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        </form>
        
  			</div>
  		</div>
 </div>
	

@endsection