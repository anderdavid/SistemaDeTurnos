@extends('layouts.app')

@section('nav-administrador')


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
						Asuntos
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item  navbar-dark" href="/asuntos/create">Crear Asuntos</a>
						<a class="dropdown-item  navbar-dark" href="/asuntos/asignarAsuntos/show/1">Asignar Asuntos</a>	
					</div>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">
						Oficinistas
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item  navbar-dark" href="/oficinistas">Ver Oficinistas</a>	
						<a class="dropdown-item  navbar-dark" href="/oficinistas/create">Crear Oficinistas</a>	
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">
						Puestos
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item  navbar-dark" href="/puestos">Ver Puestos</a>	
						<a class="dropdown-item  navbar-dark" href="/puestos/create">Crear Puestos</a>
						<a class="dropdown-item  navbar-dark" href="/puestos/AsignarPuestos/">Asignar Puestos</a>
					
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">
						Clientes
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item  navbar-dark" href="/clientes">Ver Clientes</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>

@endsection