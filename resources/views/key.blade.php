@extends('layouts.app')

@section('content')
        @if (session()->has('status'))
    <div class="container alert-success text-center text-uppercase w-50 py-4" role="alert">
    {{ session('status') }}
    </div>
    @endif  
  
   <div class="row justify-content-md-center mt-5 py-5">
        <div class="col-md-5">
            <div class="card rounded">
                <div class="card-header display-5 pb-3 bg-login rounded d-flex align-items-center justify-content-md-center"><b>Solicitar Contraseña</b></div>
                <div class="card-body bg-login pt-5 rounded">
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
                            <div class="col-lg-6 offset-lg-4 mt-3">                        
                                <button type="submit" class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#correo">
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