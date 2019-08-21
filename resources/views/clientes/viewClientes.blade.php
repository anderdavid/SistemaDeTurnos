@extends('layouts.nav-administrador')
@section('content')

<div class="container">
	  <h1 class="text-secondary">Ver Clientes</h1>
	
	<br><br> 
	<table class="table  table-striped table-responsive-md mt-3">
		<thead class="thead-dark">
			<tr>
				<th>id </th>
				<th>Nombre </th>
				<th>Cedula </th>
				<th>Asunto </th>
				<th>Punto de Atención</th>
			
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
	<!-- <a href="/clientes/createTable" class="btn btn-success">Crear Tabla Clientes10</a>
	<a href="/clientes/createTableSchema" class="btn btn-success">Crear Tabla Clientes21</a> -->
</div>
@endsection