@extends('layouts.nav-superadministrador')
@section('content')

<script type="text/javascript">
	var idUsuario="";

	function eliminar(id){
		idPuntoAtencion =id;

	}
	function borrar(){
		location.href = "/puntosAtencion/destroy/"+idPuntoAtencion;
	}
</script>
<div class="container">
	<h1 class="text-secondary">Ver Punto de Atencion</h1><br>
	<div class="row justify-content-center">

		<div class="col-md-10">
			<div class="card">
				<div class="card-header bg-secondary text-white">
					PUNTO DE ATENCION
				</div>
				<div class="card-body">
					<p><strong>Id: </strong>{{$puntoAtencion->id}}</p>
					<p><strong>Nombre: </strong>{{$puntoAtencion->nombre}}</p>
					<p><strong>Direccion: </strong>{{$puntoAtencion->direccion}}</p>
					<p><strong>Actividad: </strong>{{$puntoAtencion->actividad}}</p>
					<p><strong>Nombre Empresa: </strong>{{$puntoAtencion->nombre_empresa}}</p>
					<p><strong>Nit Empresa: </strong>{{$puntoAtencion->nit_empresa}}</p>
				</div>
			</div>
			<div class="card">
				<div class="card-header bg-secondary text-white">
					ADMINISTRADOR
				</div>
				<div class="card-body">
					<p><strong>id: </strong>{{$administrador->id}}</p>
					<p><strong>Nombre: </strong>{{$administrador->name}}</p>
					<p><strong>Email: </strong>{{$administrador->email}}</p>
					<p><strong>Cedula: </strong>{{$administrador->cedula}}</p>
					<p><strong>Password: </strong>{{$administrador->password}}</p>
				</div>	
			</div>
			<div class="container-buttons">
			 	<a href="/puntosAtencion/edit/{{$puntoAtencion->id}}" class="btn btn-primary text-white">Editar</a>
			 	<a  onclick="eliminar({{$puntoAtencion->id}})" data-toggle="modal" data-target="#modalErase" class="btn btn-danger  text-white">Eliminar</a>
 			</div>
	</div>
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


@endsection



  				