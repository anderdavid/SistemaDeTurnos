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
			<h2 class="text-secondary">Crear Puntos de Atención</h2><br>
		</div>
	</div>
	
	
	<div class="row justify-content-center">

		<div class="col-md-10">

			<form method="POST" action="/puntosAtencion/store">
				{{ csrf_field() }}
				<div class="card">
					<div class="card">
						<div class="card-header bg-secondary text-white">DATOS DE PUNTO DE ATENCION</div>
						<div class="card-body">
							<div class="form-group">
								<label for="nombrePuntoAtencion">Nombre Punto de Atención: </label>
								<input class="form-control" type="text" name="nombrePuntoAtencion" placeholder="Ingrese nombre punto de atención" required="true" value="{{$user->nombrePuntoAtencion}}">
							</div>
							<div class="form-group">
								<label for="direccion">Dirección:</label>
								<input class="form-control" type="text" name="direccion" placeholder="Ingrese la dirección del punto de atención" required="true" value="{{$user->direccion}}">
							</div>
							<div class="form-group">
								<label for="actividad">Actividad: </label>
								<input class="form-control" type="text" name="actividad" placeholder="Ingrese la actividad del punto de atención o empresa" required="true" value="{{$user->actividad}}">
							</div>
							<div class="form-group">
								<label for="nombre_empresa">Nombre Empresa:</label>
								<input class="form-control" type="text" name="nombre_empresa" placeholder="Ingrese nombre de la empresa" required="true" value="{{$user->nombre_empresa}}">
							</div>
							<div class="form-group">
								<label for="nit_empresa">Nit Empresa:</label>
								<input class="form-control" type="text" pattern="[0-9-]{4,12}" name="nit_empresa" title="El formato de número de  NIT  es incorrecto." placeholder="Ingrese NIT de la empresa" required="true" value="{{$user->nit_empresa}}">
							</div>
						</div>
					</div>
					
					<div class="card">
						<div class="card-header bg-secondary text-white">DATOS DE ADMINISTRADOR</div>
						<div class="card-body">
							<div class="form-group">
								<label for="name">Nombre: </label>
								<input class="form-control" type="text" name="name" placeholder="Ingrese nombre" required="true" value="{{$user->name}}">
							</div>
							<div class="form-group">
								<label for="email">Email: </label>
								<input class="form-control" type="email" name="email" placeholder="Ingrese email" required="true" value="{{$user->email}}">
							</div>
							<div class="form-group">
								<label for="cedula">Cédula: </label> 
								<input class="form-control" type="text" name="cedula" pattern="[0-9-]{4,12}" title="El número de cedula solo admite números." placeholder="cédula" required="true" value="{{$user->cedula}}">
							</div>
							<div class="form-group">
								<label for="password">Password: </label>
								<input class="form-control" type="password" name="password" placeholder="Ingrese password" required="true" value="{{$user->password}}">
							</div>
						</div>
					</div>

					<br>
					<div class="form-group">
						<input class="btn btn-primary ml-3" type="submit" name="registrar" value="Registrar">
					</div>

				</form>
			</div>
		</div>
	</div>

	
@endsection