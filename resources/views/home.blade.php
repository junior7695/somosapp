@extends('layouts.app')

@section('content')

<div class="d-flex align-items-stretch">
    <div class="sidebar bg-dark">
        <ul class="list-unstyled">
              @can('roles.index')
              <li>
                <a href="#submenu1" data-toggle="collapse" class="py-5"><i class="fas fa-arrow-down"></i> ROLES</a>
                <ul id="submenu1" class="list-unstyled collapse">
                    <li><a href="#">MOSTRAR</a></li>
                    <li><a href="#">CREAR</a></li>
                </ul>
            </li>
            @endcan
            <li>
                <a href="#submenu2" data-toggle="collapse" class="py-5"><i class="fa fa-fw fa-address-card"></i> USUARIOS</a>
                <ul id="submenu2" class="list-unstyled collapse">
                    <li><a href="{{ route('users.create') }}">CREAR</a></li>
                    <li><a href="{{ route('users.index') }}">MOSTRAR</a></li>
                  
                  <!--  <li><a href="">ACTUALIZAR</a></li> -->
                  
                </ul>
            </li>

            <li>
                <a href="#submenu3" data-toggle="collapse" class="py-5"><i class="fa fa-fw fa-address-card"></i> BENEFICIARIO</a>
                <ul id="submenu3" class="list-unstyled collapse">
                    <li><a href="#">MOSTRAR</a></li>
                    <li><a href="#">CONSULTAR</a></li>
                    <li><a href="#">ACTUALIZAR</a></li>
                </ul>
            </li>
            <li>
                
            </li>
            <li><a href="#" class="py-5"><i class="fa fa-fw fa-link"></i> PERFIL </a></li>
            <li><a href="#" class="py-5"><i class="fa fa-fw fa-link"></i> REPORTES </a></li>
            
            
            
        </ul>
    </div>

    <div class="container mt-2">
     <!-- Toogle en construccion
      <a class="sidebar-toggle text-light mr-3 btn btn-dark">Toogle</i></a> 
     -->
    
    <h1 class="display-5 my-5 text-center lead">Bienvenido {{ Auth::user()->name }} </h1>
  

  @yield('principal')
    
        

        
    </div>
</div>
    
     
@endsection

@section('footer')

  <div class="card-body bg-success text-center bg-danger">
    <blockquote class="blockquote mb-0">
      <p>Compañía Anónima Nacional Teléfonos de Venezuela.</p>
      <footer class="blockquote-footer text-white"> RIF: J-00124134-5.- Todos los derechos reservados</footer>
       <cite title="Source Title" class="text-dark"><b>Somos</b>Venezuela</cite>
    </blockquote>
  </div>

@endsection
