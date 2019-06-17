@extends('layouts.nav-superadministrador')
@section('content')

<div class="container">
	<h1>Ver Clientes</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<td>id</td> 
				<td>nombre</td> 
				<td>cedula</td> 
				<td>asunto</td> 
				<td>punto_de_atencion_id</td> 
			
			</tr>
		</thead>
		<tbody>
		@foreach ($clientes as $cliente) 
		<tr>
			<td>{{$cliente->id}}</td> 
			<td>{{$cliente->nombre}}</td> 
			<td>{{$cliente->cedula}}</td> 
			<td>{{$cliente->asunto}}</td> 
			<td>{{$cliente->punto_de_atencion_id}}</td>
		</tr>
			 
		@endforeach
		</tbody>
	</table>
	<a href="/clientes/createTable" class="btn btn-success">Crear Tabla Clientes10</a>
	<a href="/clientes/createTableSchema" class="btn btn-success">Crear Tabla Clientes21</a>
</div>
@endsection