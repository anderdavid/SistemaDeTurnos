@extends('layouts.nav-superadministrador')
@section('content')

<div class="container">
	<h1 class="text-secondary">Ver Punto de Atencion</h1><br>
	<div class="row justify-content-center">

		<div class="col-md-10">
			<div class="card">
				<div class="card-header bg-secondary text-white">
					PUNTO DE ATENCION
				</div>
				<div class="card-body">
					<p><strong>Nombre: </strong>{{$puntoAtencion->nombre}}</p>
					<p><strong>Direccion: </strong>{{$puntoAtencion->direccion}}</p>
					<p><strong>Actividad: </strong>{{$puntoAtencion->actividad}}</p>
					<p><strong>Nombre Empresa: </strong>{{$puntoAtencion->nombre_empresa}}</p>
					<p><strong>Nit Empresa: </strong>{{$puntoAtencion->nit_empresa}}</p>
				</div>
			</div>
			<div class="card">
				<div class="card-header bg-secondary text-white">
					ADMINISTRADOR
				</div>
				<div class="card-body">
					<p><strong>id: </strong>{{$administrador->id}}</p>
					<p><strong>Nombre: </strong>{{$administrador->name}}</p>
					<p><strong>Email: </strong>{{$administrador->email}}</p>
					<p><strong>Cedula: </strong>{{$administrador->cedula}}</p>
					<p><strong>Password: </strong>{{$administrador->password}}</p>
					
			</div>
	</div>
</div>
@endsection

  				<!-- $mUsuario->name=$request->name;
                $mUsuario->email=$request->email;
                $mUsuario->cedula=$request->cedula;
                $mUsuario->password=bcrypt($request->password);
                $mUsuario->save();

                $mPuntoAtencion->nombre=$request->nombrePuntoAtencion;
                $mPuntoAtencion->direccion=$request->direccion;
                $mPuntoAtencion->actividad=$request->actividad;
                $mPuntoAtencion->nombre_empresa=$request->nombre_empresa;
                $mPuntoAtencion->nit_empresa=$request->nit_empresa; -->