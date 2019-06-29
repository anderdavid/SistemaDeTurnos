@extends('layouts.nav-administrador')
@section('content')
	<!-- <h1>ver Oficinistas</h1>
	<h2>punto de atencion Id {{$puntoAtencionId}}</h2>
	<p>{{ json_encode($oficinistas)}}</p> -->


	<div class="container">
		<h1 class="text-secondary">Ver Oficinistas</h1><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>id</th>
					<th>Nombre</th>
					<th>Cedula</th>
					<th>Email</th>
					<th>Password</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($oficinistas as $oficinista)
				<tr>
					<td>{{$oficinista->id}}</td>
					<td>{{$oficinista->nombre}}</td>
					<td>{{$oficinista->cedula}}</td>
					<td>{{$oficinista->email}}</td>
					<td>{{$oficinista->password}}</td>
					<td id="action">
						<div class="row">
							<div class="col-md-3">
								<a href="#">
									<i class="icono-action fa fa-eye"></i>
									<span class="tooltiptext">Ver</span>
								</a>
							</div>

							<div class="col-md-3">
								<a  href="#"><i class="icono-action far fa-edit"></i>
									<span class="tooltiptext">Editar</span>
								</a>

							</div>

							<div class="col-md-3">
							<a onclick="alert('eliminar')" data-toggle="modal" data-target="#modalErase">
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
	</div>
	
@endsection

 <!-- $table->bigIncrements('id');
$table->string('nombre');
$table->string('cedula');
$table->string('email')->unique();
$table->string('password'); -->