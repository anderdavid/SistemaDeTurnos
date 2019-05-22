@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-info">Por favor tome su turno</h3>
    <div class="col-md-9">
    	<div class="card">
    		<div class="card-body">
    			<form method="post" action="turnos/store">
    				{{ csrf_field() }}
    				<div class="form-group">
    					<label for="name">Ingrese su nombre</label>
    					<input class="form-control" type="text" required="true" name="name" placeholder="nombre">
    				</div>
    				<div class="form-group">
    					<label for="name">Ingrese su numero de cedula</label>
    					<input class="form-control" type="number" required="true" name="cedula" placeholder="cedula" min="999999" max="1000000000000">
    				</div>
    				<input class="btn btn-success" value="Tomar Turno" type="submit">
    			</form>
    		</div>
    	</div>
    </div>
</div>
@endsection