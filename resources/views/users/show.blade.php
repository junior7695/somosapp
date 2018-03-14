@extends('home')

@section('principal')

<div class="container mb-5">
    <h1 class="text-center text-muted text-uppercase">Usuario <code>{{ $user->name }}</code></h1>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
        
        <hr>
        <h2><strong>Perfil del Usuario</h2>
        <h3>{{ $user->email }}</h3>
        <h3>{{ $user->tlf }}</h3>
        <h3>{{ $user->entidad }}</h3>
        <hr>
        <table class="table table-bordered table-success">
            <thead class="thead-dark">
                            <tr>
                                <th>Roles asignados</th>
                            </tr>
            </thead>
            <tbody>
                <ul>
                @foreach($roles as $rol)
                <tr>
                    <td>
                        <li>{{ $rol-> name }}
                        </li>
                        <em>{{ $rol-> description }}
                    </td>
                </tr>
                @endforeach
                </ul>
            </tbody>
            </table>

        </div>
    </div>
</div>
@endsection