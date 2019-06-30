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
								<input class="form-control" type="text" name="nombre" placeholder="Ingrese nombre de oficinista" value="{{$oficinista->nombre}}">
							</div>
							<div class="form-group">
								<label for="cedula">Cedula:</label>
								<input class="form-control" type="number" name="cedula" placeholder="Ingrese cedula de oficinista" value="{{$oficinista->cedula}}">
							</div>
							<div class="form-group">
								<label for="email">Email:</label>
								<input class="form-control" type="email" name="email" placeholder="Ingrese email de oficinista" value="{{$oficinista->email}}">
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input class="form-control" type="password" name="password" placeholder="Ingrese cedula de oficinista" value="{{$oficinista->password}}">
							</div>
							<div class="form-group">
								<input class="btn btn-success" type="submit" name="registrar" value="Guardar">
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