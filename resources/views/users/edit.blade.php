@extends('home')

@section('principal')

    
    
    @if (session()->has('status'))
    <div class="container alert-success text-center text-uppercase w-50 py-4" role="alert">
    {{ session('status') }}
    </div>
    @endif  
    
    
	<div class="container mb-5">
  		<h1 class="text-center text-muted">Editar a {{ $user->name }}</h1>
  		
      <div class="row d-flex justify-content-center">
  			<div class="col-md-6">
  				{{   Form::model($user, ['route' => ['users.update', $user->id],
                    'method' => 'PUT']) }}

                        @include('users.partials.form')
                        
                    {{   Form::close() }}
        
  			</div>
  		</div>
 </div>
	

@endsection