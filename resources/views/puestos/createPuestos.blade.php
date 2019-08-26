@extends('layouts.nav-administrador')
@section('content')
	
	<div class="container">
		<h1 class="text-secondary">Crear Puestos</h1><br>
		<div class="row justify-content-center">
			<div class="col-md-10">
				<form method="POST" action="/puestos/store">
					{{ csrf_field() }}
					<div class="card">
						<div class="card-body">
							<div class="form-group">
								<label for="numero">Número: </label>
								<input class="form-control" type="text" name="numero" placeholder="Ingrese número de puesto" required="true">
							</div>
							<div class="form-group">
								<label for="descripcion">Descripción:</label>
								<input class="form-control" type="text" name="descripcion" placeholder="Ingrese descripción de puesto" required="true">
							</div>
							<div class="form-group">
								<input class="btn btn-primary" type="submit" name="registrar" value="Registrar">
							</div>
							
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection