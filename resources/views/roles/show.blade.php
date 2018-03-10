@extends('home')

@section('principal')

<div class="container mb-5">
    <h1 class="text-center text-muted text-uppercase">rol <code>{{ $role->name }}</code></h1>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
        
        <hr>
        <h2><strong>Descripción del Rol: </strong></h2>
        <h3>{{ $role->description }}</h3>
        <hr>
        <table class="table table-bordered table-success">
            <thead class="thead-dark">
                            <tr>
                                <th>Permisos</th>
                            </tr>
            </thead>
            <tbody>
                <ul>
                @foreach($permissions as $permission)
                <tr>
                    <td>
                        <li>{{ $permission-> name }}
                        </li>
                        <em>{{ $permission-> description }}
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