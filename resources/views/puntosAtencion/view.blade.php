@extends('layouts.nav-superadministrador')
@section('content')

<div class="container">
	<h1 class="text-secondary">Ver Puntos de Atencion</h1><br>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>id</th>
				<th>Nombre</th>
				<th>direccion</th>
				<th>actividad</th>
				<th>Nombre Empresa</th>
				<th>Nit Empresa</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($puntosAtencion as $puntoAtencion)
			<tr>
				<th>{{$puntoAtencion->id}}</th>
				<td>{{$puntoAtencion->nombre}}</td>
				<td>{{$puntoAtencion->direccion}}</td>
				<td>{{$puntoAtencion->actividad}}</td>
				<td>{{$puntoAtencion->nombre_empresa}}</td>
				<td>{{$puntoAtencion->nit_empresa}}</td>
				<td>
					<ul>
						<li><a href="/puntosAtencion/show/{{$puntoAtencion->id}}">Ver</a></li>
						<li><a href="/puntosAtencion/edit/{{$puntoAtencion->id}}">Editar</a></li>
						<li><a href="#">Eliminar</a></li>
					</ul>
				</td>
			</tr> 
			@endforeach
		</tbody>
	</table>
</div>



@endsection