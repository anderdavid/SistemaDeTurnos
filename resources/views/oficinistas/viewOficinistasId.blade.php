@extends('layouts.nav-administrador')
@section('content')
	<script type="text/javascript">
		function editar(id){
			location.href = "/oficinistas/edit/"+id;
		}

		function eliminar(id){
			idOficinista =id;
		}

		function borrar(){
			location.href = "/oficinistas/destroy/"+idOficinista;
		}
	</script>
	
	<div class="container">
		<h1 class="text-secondary">Ver Oficinista</h1><br>
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header bg-secondary text-white">
					OFICINISTA
				</div>
				<div class="card-body">
					<p><strong>Id: </strong>{{$oficinista->id}}</p>
					<p><strong>Nombre: </strong>{{$oficinista->nombre}}</p>
					<p><strong>Cédula: </strong>{{$oficinista->cedula}}</p>
					<p><strong>Cargo: </strong>{{$oficinista->cargo}}</p>
					<p><strong>Género: </strong>{{$oficinista->genero}}</p>
					<p><strong>Oficinista: </strong>{{$oficinista->email}}</p>
					<p><strong>Password: </strong>{{$oficinista->password}}</p>
				
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<button class="btn btn-primary" onclick="editar({{$oficinista->id}})">Editar</button>
						<button class="btn btn-danger"  onclick="eliminar({{$oficinista->id}})" data-toggle="modal" data-target="#modalErase">Eliminar</button>
					</div>
					<div class="col-md-6"></div>
				</div>
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
					¿Está seguro de eliminar este oficinista?
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

