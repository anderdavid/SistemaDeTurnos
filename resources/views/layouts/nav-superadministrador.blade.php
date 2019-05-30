@extends('layouts.app')

@section('nav-superadministrador')


<nav class="navbar navbar-expand-md bg-primary navbar-dark shadow-sm">
	<div class="container-menu" style="margin-left: 30px;">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">INICIO</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">
						Puntos de Atencion
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item  navbar-dark" href="/puntosAtencion">Ver Puntos de Atencion</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="/puntosAtencion/create">Crear Puntos de Atencion</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>

@endsection