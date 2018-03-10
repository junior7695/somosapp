@extends('home')

@section('principal')
<div class="container mb-5">
    <h1 class="text-center text-muted text-uppercase">Crear Nuevo Rol </h1>
    <div class="row d-flex justify-content-center">
        {{   Form::open(['route' => 'roles.store']) }}

                        @include('roles.partials.form')
                        
                    {{   Form::close() }}
    </div>
</div>
@endsection