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
			</tr>
			@endforeach	
		</tbody>
	</table>
</div>
@endsection

<!-- $table->bigIncrements('id');
$table->string('name');
$table->string('email')->unique();
$table->string('cedula')->nullable();
$table->timestamp('email_verified_at')->nullable();
$table->string('password'); -->