@extends('home')

@section('principal')
<div class="container-fluid">
	<div class="row table-responsive-sm">
		<table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Reporte</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            @foreach($reportes as $reporte)
            <tbody>
                <tr>
                    <td>{{ $reporte->id }}</td>
                    <td>{{ $reporte->reporte }}</td>
                    <td>{{ $reporte->fecha }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
	
	<div class="container d-flex justify-content-center display-5">
		{{ $reportes->render() }}
		
	</div>
	</div>
	
</div>

@endsection