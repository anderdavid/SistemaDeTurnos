@extends('layouts.nav-superadministrador')
@section('content')

<div class="container">
	<script type="text/javascript">
		var idUsuario="";
		
		function eliminar(id){
			idPuntoAtencion =id;
			
		}
		function borrar(){
			location.href = "/puntosAtencion/destroy/"+idPuntoAtencion;
		}
	</script>
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
						<li><a class="btn btn-success" href="/puntosAtencion/show/{{$puntoAtencion->id}}">Ver</a></li>
						<li><a class="btn btn-primary" href="/puntosAtencion/edit/{{$puntoAtencion->id}}">Editar</a></li>
						<!-- <li><a href="/puntosAtencion/destroy/{{$puntoAtencion->id}}">Eliminar</a></li>  -->
						<li><button class="btn-danger" onclick="eliminar({{$puntoAtencion->id}})" data-toggle="modal" data-target="#modalErase">Eliminar</button></a></li> 
					</ul>
				</td>
			</tr> 
			@endforeach
		</tbody>
	</table>
</div>

<div class="modal" id="modalErase">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger ">
				<h4 class="modal-title text-light">Advertencia!</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				¿Esta seguro de eliminar este usuario?
			</div>
			<div class="modal-footer">
				<div class="row" style="margin-right: 10px">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<button onClick="borrar()" class="btn btn-primary">Aceptar</button>
					</div>
					<div class="col-md-4">
						<button class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>



@endsection