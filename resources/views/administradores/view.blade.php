@extends('layouts.nav-superadministrador')
@section('content')

<div class="container">
	<h1 class="text-secondary">Ver Administradores</h1><br>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>id</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Cedula</th>
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
				<td>{{$administrador->password}}</td>
				<td>
					<ul>
						<li><a href="/administradores/show/{{$administrador->id}}">Ver</a></li>
						<li><a href="#">Editar</a></li>
						<li><a href="#">Eliminar</a></li>
					</ul>
				</td>
			</tr>
			@endforeach	
		</tbody>
	</table>
</div>
@endsection

