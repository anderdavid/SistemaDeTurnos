@extends('layouts.nav-superadministrador')
@section('content')

<div class="container">
	<script type="text/javascript">
		var idUsuario="";

		function eliminar(id){
			idAdministrador =id;

		}
		function borrar(){
			location.href = "/administradores/destroy/"+idAdministrador;
		}
	</script>

	<h1 class="text-secondary">Ver Administradores</h1><br>
	<form class="form-inline" style="float: right;">
		<label for="nombre"></label>
		<input class="form-control" type="text" name="nombre" placeholder="Buscar por Nombre" />
		<label for="empresa" style="margin-left: 5px"></label>
		<input class="form-control" type="text" name="cedula" placeholder="Buscar por Cedula"/>
		
		<button type="submit" class="btn btn-info" style="margin-left: 5px">
			<span style="color:#fff">
				<i class="icono-action fa fa-search" 
					style="color:#fff; font-size:12px">
				</i> Buscar
			</span>
		</button>
	</form>
	<br><br>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>id</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Cedula</th>
				<th>Punto de Atencion</th>
				<th>Password</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($administradores as $administrador) 
			<tr>
				<td>{{$administrador->id}}</td>
				<td>{{$administrador->name}}</td>
				<td>{{$administrador->email}}</td>
				<td>{{$administrador->cedula}}</td>
				<td>{{$administrador->punto_de_atencion}}</td>
				<!-- <td>{{$administrador->password}}</td> -->
				<td>{{substr($administrador->password, 0, 8)}}</td>
				<!-- <td>
					<ul>
						<li><a href="/administradores/show/{{$administrador->id}}">Ver</a></li>
						<li><a href="#">Editar</a></li>
						<li><a href="#">Eliminar</a></li>
					</ul>
				</td> -->
				<td id="action">
					<div class="row">
						<div class="col-md-3">
							<a href="/administradores/show/{{$administrador->id}}">
								<i class="icono-action fa fa-eye"></i>
								<span class="tooltiptext">Ver</span>
							</a>
						</div>

						<div class="col-md-3">
							<a  href="/administradores/edit/{{$administrador->id}}"><i class="icono-action far fa-edit"></i>
								<span class="tooltiptext">Editar</span>
							</a>

						</div>

						<div class="col-md-3">
							
							<a onclick="eliminar({{$administrador->id}})" data-toggle="modal" data-target="#modalErase">
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
	{!!$administradores->render()!!}
</div>

<div class="modal" id="modalErase">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger ">
				<h4 class="modal-title text-light">Advertencia!</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				¿Esta seguro de eliminar este usuario?
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

