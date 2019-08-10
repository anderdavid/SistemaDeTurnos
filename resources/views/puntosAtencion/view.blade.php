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
	<style type="text/css">
		#columna{
			width: 100px;
			overflow: auto;
			background-color: #826222;
		}
	</style>
	<h2 class="text-secondary">Ver Puntos de Atención</h2><br>
	<form class="form-inline" style="float: right;">
		<label for="nombre"></label>
		<input class="form-control" type="text" name="nombre" placeholder="Buscar por Nombre" />
		<label for="empresa" style="margin-left: 5px"></label>
		<input class="form-control" type="text" name="empresa" placeholder="Buscar por Empresa"/>
		
		<button type="submit" class="btn btn-info" style="margin-left: 5px">
			<span style="color:#fff">
				<i class="icono-action fa fa-search" 
					style="color:#fff; font-size:12px">
				</i> Buscar
			</span>
		</button>
	</form>
	<br><br> 
	<table class="table  table-striped table-responsive-md mt-3">
		<thead class="thead-dark">
			<tr>
			<th id="mId">id</th>
			<th>Nombre</th>
			<th>Dirección</th>
			<th>Actividad</th>
			<th>Nombre Empresa</th>
			<th>Nit Empresa</th>
			<th>Administrador</th>
			<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($puntosAtencion as $puntoAtencion)
			<tr>
				<td>{{$puntoAtencion->id}}</td>
				<td>{{$puntoAtencion->nombre}}</td>
				<td>{{$puntoAtencion->direccion}}</td>
				<td>{{$puntoAtencion->actividad}}</td>
				<td>{{$puntoAtencion->nombre_empresa}}</td>
				<td>{{$puntoAtencion->nit_empresa}}</td>
				<td>{{$puntoAtencion->administrador}}</td>

				<td id="action">
					<div class="row">
						<div class="col-md-3">
							<a href="/puntosAtencion/show/{{$puntoAtencion->id}}">
								<i class="icono-action fa fa-eye"></i>
								<span class="tooltiptext">Ver</span>
							</a>
						</div>

						<div class="col-md-3">
							<a  href="/puntosAtencion/edit/{{$puntoAtencion->id}}"><i class="icono-action far fa-edit"></i>
								<span class="tooltiptext">Editar</span>
							</a>

						</div>

						<div class="col-md-3">
							
							<a onclick="eliminar({{$puntoAtencion->id}})" data-toggle="modal" data-target="#modalErase">
								<i class="icono-action fas fa-trash-alt"></i>
								<span class="tooltiptext">Borrar</span>
							</a>
						</div>
					</div>
					
				</td>
			</tr> 
			@endforeach
		</tbody>
	</table>
	{!!$puntosAtencion->render()!!}
</div>

<div class="modal" id="modalErase">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger ">
				<h4 class="modal-title text-light">Advertencia!</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				¿Esta seguro de eliminar este punto de atencion?
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

<!-- <div class="col-lg-3">
	<a href="editarEmpleado.html"><i class="icono-action far fa-edit"></i>
	 	<span class="tooltiptext">Editar</span>
	</a>
</div> -->
@endsection