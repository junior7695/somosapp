@extends('home')

@section('principal')
<div class="container mb-5">
    <h1 class="text-center text-muted text-uppercase">Editar rol <code>{{ $role->name }}</code></h1>
    <div class="row d-flex justify-content-center">
        {{   Form::model($role, ['route' => ['roles.update', $role->id],
                    'method' => 'PUT']) }}

                        @include('roles.partials.form')
                        
                    {{   Form::close() }}
    </div>
</div>
@endsection