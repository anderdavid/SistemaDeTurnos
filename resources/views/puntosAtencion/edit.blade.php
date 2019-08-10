@extends('layouts.nav-superadministrador')
@section('alert')
@if(isset($msg))
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Error! </strong>{{$msg}}
</div>
@endif
@endsection
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<h1 class="text-secondary">Editar Punto de Atención</h1><br>
		</div>
	</div>
	
	<div class="row justify-content-center">

		<div class="col-md-10">

			<form method="POST" action="/puntosAtencion/update/{{$puntoAtencion->id}}">
				{{ csrf_field() }}
				<div class="card">
					<div class="card">
						<div class="card-header bg-secondary text-white">PUNTO DE ATENCION</div>
						<div class="card-body">
							<div class="form-group">
								<label for="id">Id: </label>
								<input class="form-control" type="text" name="id"  required="true" disabled="true" 
								value="{{$puntoAtencion->id}}">
							</div>
							<div class="form-group">
								<label for="nombrePuntoAtencion">Nombre Punto de Atención: </label>
								<input class="form-control" type="text" name="nombrePuntoAtencion" placeholder="Ingrese nombre punto de atención" required="true"
								value="{{$puntoAtencion->nombre}}">
							</div>
							<div class="form-group">
								<label for="direccion">Dirección:</label>
								<input class="form-control" type="text" name="direccion" placeholder="Ingrese la dirección del punto de atención" required="true"
								value="{{$puntoAtencion->direccion}}">
							</div>
							<div class="form-group">
								<label for="actividad">Actividad: </label>
								<input class="form-control" type="text" name="actividad" placeholder="Ingrese la actividad del punto de atención o empresa" required="true" value="{{$puntoAtencion->actividad}}">
							</div>
							<div class="form-group">
								<label for="nombre_empresa">Nombre Empresa:</label>
								<input class="form-control" type="text" name="nombre_empresa" placeholder="Ingrese nombre empresa" required="true"
								value="{{$puntoAtencion->nombre_empresa}}">
							</div>
							<div class="form-group">
								<label for="nit_empresa">Nit Empresa:</label>
								<input class="form-control" type="text" pattern="[0-9-]{4,12}" name="nit_empresa" placeholder="Ingrese NIT de la empresa" required="true"
								value="{{$puntoAtencion->nit_empresa}}">
							</div>
						</div>
					</div>
					
					

					
					<div class="card">
						<div class="card-header bg-secondary text-white">ADMINISTRADOR</div>
						<div class="card-body">
							<div class="form-group">
								<label for="id">Id: </label>
								<input class="form-control" type="text" name="id"  required="true" disabled="true" 
								value="{{$administrador->id}}">
							</div>
							<div class="form-group">
								<label for="name">Nombre: </label>
								<input class="form-control" type="text" name="name" placeholder="Ingrese nombre" required="true"
								value="{{$administrador->name}}">
							</div>
							<div class="form-group">
								<label for="email">Email: </label>
								<input class="form-control" type="email" name="email" placeholder="Ingrese email" required="true"
								value="{{$administrador->email}}">
							</div>
							<div class="form-group">
								<label for="cedula">Cédula: </label>
								<input class="form-control" type="text" name="cedula" placeholder="cédula" required="true"
								value="{{$administrador->cedula}}">
							</div>
							<div class="form-group">
								<label for="password">Password: </label>
								<input class="form-control" type="password" name="password" placeholder="Ingrese password" required="true"
								value="{{$administrador->password}}">
							</div>
						</div>
					</div>

					<br>
					<div class="form-group">
						<input class="btn btn-success ml-3" type="submit" name="registrar" value="Actualizar">
					</div>
				</div>

				</form>
			</div>
		</div>
	</div>


	@endsection


