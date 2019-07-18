@extends('layouts.nav-administrador')
@section('content')
	<!-- <h1>create Oficinista</h1>
	<h2>punto de atencion Id {{$puntoAtencionId}}</h2> -->

	<div class="container">
		<h1 class="text-secondary">Crear Oficinista</h1><br>
		<div class="row justify-content-center">
			<div class="col-md-10">
				<form method="POST" action="/oficinistas/store">
					{{ csrf_field() }}
					<div class="card">
						<div class="card-body">
							<div class="form-group">
								<label for="nombre">Nombre:</label>
								<input class="form-control" type="text" name="nombre" placeholder="Ingrese nombre de oficinista" required="true">
							</div>
							<div class="form-group">
								<label for="cedula">Cedula:</label>
								<input class="form-control" type="number" name="cedula" placeholder="Ingrese cedula de oficinista" required="true">
							</div>
							<div class="form-group">
								<label for="cargo">Cargo:</label>
								<input class="form-control" type="text" name="cargo" placeholder="Ingrese Cargo de oficinista" required="true">
							</div>
							<div class="form-group">
								<label for="email">Email:</label>
								<input class="form-control" type="email" name="email" placeholder="Ingrese email de oficinista" required="true">
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input class="form-control" type="password" name="password" placeholder="Ingrese password" required="true">
							</div>
							<div class="form-group">
								<input class="btn btn-primary" type="submit" name="registrar" value="registrar">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

 <!-- $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('cedula');
            $table->string('email')->unique();
            $table->string('password'); -->
