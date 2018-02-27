@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">Dashboard</div>
                    <div class="container mt-4">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                Usuarios
                            </div>
                        </div>
                    </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
