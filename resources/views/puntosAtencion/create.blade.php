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
	<h1 class="text-secondary">Crear Puntos de Atencion</h1><br>
	<div class="row justify-content-center">

		<div class="col-md-10">

			<form method="POST" action="/puntosAtencion/store">
				{{ csrf_field() }}
				<div class="card">
					
					<div class="card-header bg-secondary text-white">DATOS DE PUNTO DE ATENCION</div>
					<div class="card-body">
						<div class="form-group">
							<label for="nombrePuntoAtencion">Nombre Punto de Atención: </label>
							<input class="form-control" type="text" name="nombrePuntoAtencion" placeholder="Ingrese nombre punto de atención" required="true">
						</div>
						<div class="form-group">
							<label for="direccion">Dirección:</label>
							<input class="form-control" type="text" name="direccion" placeholder="Ingrese la dirección del punto de atención" required="true">
						</div>
						<div class="form-group">
							<label for="actividad">Actividad: </label>
							<input class="form-control" type="text" name="actividad" placeholder="Ingrese la actividad del punto de atención o empresa" required="true">
						</div>
						<div class="form-group">
							<label for="nombre_empresa">Nombre Empresa:</label>
							<input class="form-control" type="text" name="nombre_empresa" placeholder="Ingrese nombre empresa" required="true">
						</div>
						<div class="form-group">
							<label for="nit_empresa">Nit Empresa:</label>
							<input class="form-control" type="text" pattern="[0-9-]{4,12}" name="nit_empresa" placeholder="Ingrese nit de la empresa" required="true">
						</div>
					</div>

				<br><br><br>
				<div class="card">
					<div class="card-header bg-secondary text-white">DATOS DE ADMINISTRADOR</div>
					<div class="card-body">
						<div class="form-group">
							<label for="name">Nombre: </label>
							<input class="form-control" type="text" name="name" placeholder="Ingrese nombre" required="true">
						</div>
						<div class="form-group">
							<label for="email">Email: </label>
							<input class="form-control" type="email" name="email" placeholder="Ingrese email" required="true">
						</div>
						<div class="form-group">
							<label for="cedula">Cedula: </label>
							<input class="form-control" type="text" name="cedula" placeholder="cedula" required="true">
						</div>
						<div class="form-group">
							<label for="password">Password: </label>
							<input class="form-control" type="password" name="password" placeholder="Ingrese password" required="true">
						</div>
					</div>
				</div>

				<br><br><br>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" name="registrar" value="registrar">
				</div>
				
			</form>
		</div>
	</div>
</div>


@endsection