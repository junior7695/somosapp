@extends('layouts.app')

@section('content')

<div class="d-flex align-items-stretch">
    <div class="sidebar bg-dark">
         <ul class="list-unstyled">
              @can('roles.index')
              <li>
                <a href="#submenu1" data-toggle="collapse" class="py-5">ROLES</a>
                <ul id="submenu1" class="list-unstyled collapse">
                    <li><a href="{{ route('roles.index') }}">MOSTRAR</a></li>
                    <li><a href="#">CREAR</a></li>
                </ul>
            </li>
            @endcan
            <li >
                <a href="#submenu2" data-toggle="collapse" class="py-5"><i class="fas fa-users fa-2x mr-2"></i>  USUARIOS</a>
                <ul id="submenu2" class="list-unstyled collapse">
                    <li><a href="{{ route('users.create') }}"><i class="fas fa-plus fa-2x mr-3"></i> CREAR</a></li>
                    <li><a href="{{ route('users.index') }}"><i class="fas fa-eye fa-2x mr-3"></i>MOSTRAR</a></li>
                   </ul>
            </li>

            <li>
                <a href="#submenu3" data-toggle="collapse" class="py-5">BENEFICIARIO</a>
                <ul id="submenu3" class="list-unstyled collapse">
                    <li><a href="#">MOSTRAR</a></li>
                    <li><a href="#">CONSULTAR</a></li>
                    <li><a href="#">ACTUALIZAR</a></li>
                </ul>
            </li>
            <li>
                
            </li>
            <li><a href="#" class="py-5">PERFIL </a></li>
            <li><a href="#" class="py-5">REPORTES </a></li>
            
            
            
        </ul>

    </div>

    <div class="container mt-2">
    <h1 class="display-5 mt-5 mb-5 text-center text-capitalize lead">Bienvenido {{ Auth::user()->name }}</h1>


  @yield('principal')
    
        

        
    </div>
</div>


    
     
@endsection

@section('footer')

  <div class="card-body bg-success text-center bg-nav">
    <blockquote class="blockquote mb-0">
      <p>Compañía Anónima Nacional Teléfonos de Venezuela.</p>
      <footer class="blockquote-footer text-white"> RIF: J-00124134-5.- Todos los derechos reservados</footer>
       <cite title="Source Title" class="text-dark"><b>Somos</b>Venezuela</cite>
    </blockquote>
  </div>

@endsection
