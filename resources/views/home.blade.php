@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                <div class="card-body">
                    <a href="/create/puntosDeAtencion">Crear puntos de atencion</a><br>
                    <a href="/create/oficinistas"> Crear Oficinas</a><br>
                    <a href="/ambos">Abmos</a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
