@extends('layouts.nav-administrador')
@section('content')

	<div class="container">
		<h1 class="text-secondary">Editar Oficinista</h1><br>
		<div class="row justify-content-center">
			<div class="col-md-10">
				<form method="POST" action="/oficinistas/update/{{$oficinista->id}}">
					{{ csrf_field() }}	
					<div class="card">
						<div class="card-body">
							<div class="form-group">
								<label for="nombre">Nombre:</label>
								<input class="form-control" type="text" name="nombre" placeholder="Ingrese nombre de oficinista" value="{{$oficinista->nombre}}" required="true">
							</div>
							<div class="form-group">
								<label for="cedula">Cédula:</label>
								<input class="form-control" type="number" name="cedula" placeholder="Ingrese cédula de oficinista" value="{{$oficinista->cedula}}" required="true">
							</div>
							<div class="form-group">
								<label for="cargo">Cargo:</label>
								<input class="form-control" type="text" name="cargo" placeholder="Ingrese Cargo de oficinista" value="{{$oficinista->cargo}}" required="true">
							</div>
							<div class="form-group">
								<label>Género:</label><br>
								<label class="radio-inline"><input type="radio" name="genero" value="Masculino" {{$masculino_checkbox}}>Masculino</label>
								<label class="radio-inline"><input type="radio" name="genero" value="Femenino" {{$femenino_checkbox}}>Femenino</label>
							</div>
							<div class="form-group">
								<label for="email">Email:</label>
								<input class="form-control" type="email" name="email" placeholder="Ingrese email de oficinista" value="{{$oficinista->email}}" required="true">
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input class="form-control" type="password" name="password" placeholder="Ingrese password de oficinista" value="{{$oficinista->password}}" required="true">
							</div>
							<div class="form-group">
								<input class="btn btn-success" type="submit" name="registrar" value="Actualizar">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

<!-- $table->string('nombre');
            $table->string('cedula');
            $table->string('email')->unique();
            $table->string('password'); -->