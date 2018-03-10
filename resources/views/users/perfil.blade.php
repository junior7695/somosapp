@extends('home')

@section('principal')

    <div class="container d-flex justify-content-center justify-content-around">
      <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        <strong> tu nombre es: {{ Auth::user()->name }}</strong> .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        <strong> tu email es: {{ Auth::user()->email }}</strong> .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        <strong> tu numero de telefono es: {{ Auth::user()->tlf }}</strong> .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    <div class="container text-center alert alert-warning alert-dismissible fade show w-75" role="alert">
        <strong>Si deseas modificar algunos de tus datos completa el formulario de abajo</strong> .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
      
      <div class="row d-flex justify-content-center mb-5">
        <div class="col-md-6">
          <form action="{{ route('users.updatePerfil', Auth::user()->id) }}" method="POST">
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
    

@endsection