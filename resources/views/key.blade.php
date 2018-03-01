@extends('layouts.app')

@section('content')

<div class="container">
  
   <div class="row justify-content-md-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header lead">Solicitar Contraseña</div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('key.solicitar') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="email" class="col-lg-4 col-form-label text-lg-right">Correo</label>

                            <div class="col-lg-6">
                                <input
                                        id="email"
                                        type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email"
                                        placeholder="Indica tu Correo"
                                        value="{{ old('email') }}"
                                        required
                                        autofocus
                                >

                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 offset-lg-4">
                                <button type="submit" class="btn btn-outline-danger btn-block">
                                    Solicitar Clave
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection