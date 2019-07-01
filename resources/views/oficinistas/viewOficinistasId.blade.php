@extends('layouts.nav-administrador')
@section('content')
	<script type="text/javascript">
		function editar(id){
			location.href = "/oficinistas/edit/"+id;
		}
	</script>>
	
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
					<p><strong>Oficinista: </strong>{{$oficinista->email}}</p>
					<p><strong>Password: </strong>{{$oficinista->password}}</p>
				
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<button class="btn btn-primary" onclick="editar({{$oficinista->id}})">Editar</button>
						<button class="btn btn-danger">Eliminar</button>
					</div>
					<div class="col-md-6"></div>
				</div>
			</div>
			
		</div>
	</div>
	
@endsection

