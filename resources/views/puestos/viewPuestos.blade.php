@extends('layouts.nav-administrador')
@section('content')
<script type="text/javascript">

		var idPuesto="";

		function eliminar(id){
			idPuesto =id;
		}

		function borrar(){

			location.href = "/puestos/destroy/"+idPuesto;
		}

</script>
<div class="container">
	  <h1 class="text-secondary">Ver Puestos</h1>
	<form class="form-inline" style="float: right;">
        <label for="nombre"></label>
        <input class="form-control" type="text" name="descripcion" placeholder="Buscar por descripción " />
        <label for="empresa" style="margin-left: 5px"></label>
        <input class="form-control" type="text" name="oficinista" placeholder="Buscar por Oficinista"/>

        <button type="submit" class="btn btn-info" style="margin-left: 5px">
            <span style="color:#fff">
                <i class="icono-action fa fa-search"
                    style="color:#fff; font-size:12px">
                </i> Buscar
            </span>
        </button>
    </form>
	<br><br> 
	<table class="table  table-striped table-responsive-md mt-3">
		@if($numPuestos===0)
			<div class="alert alert-danger alert-dismissible mt-3">
			 	<button type="button" class="close" data-dismiss="alert">&times;</button>
			 	<strong>No hay Puestos</strong> 
			</div>
		@else
			<thead class="thead-dark">
				<tr>
					<th>id</th>
					<th>Número</th>
					<th>Descripción</th>
					<th>Oficinista</th>
					<th>Acciones</th>
				</tr>
			</thead>

			<tbody>
			@foreach ($puestos as $puesto)
			<tr>
				<td>{{$puesto->id}}</td>
				<td>{{$puesto->numero}}</td>
				<td>{{$puesto->descripcion}}</td>
				<td>{{$puesto->oficinista}}</td>
				<td id="action">
						<div class="row">
							<div class="col-md-3">
								<a href="/puestos/show/{{$puesto->id}}">
									<i class="icono-action fa fa-eye"></i>
									<span class="tooltiptext">Ver</span>
								</a>
							</div>

							<div class="col-md-3">
								<a  href="/puestos/edit/{{$puesto->id}}"><i class="icono-action far fa-edit"></i>
									<span class="tooltiptext">Editar</span>
								</a>

							</div>

							<div class="col-md-3">
							<a onclick="eliminar({{$puesto->id}})" data-toggle="modal" data-target="#modalErase">
								<i class="icono-action fas fa-trash-alt"></i>
								<span class="tooltiptext">Borrar</span>
							</a>
						</div>
					</div>

				</td>	
			</tr>

			@endforeach
		</tbody>
		@endif
			
	</table>
	{!!$puestos->render()!!}
</div>
<div class="modal" id="modalErase">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-danger ">
					<h4 class="modal-title text-light">Advertencia!</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					¿Está seguro de eliminar este puesto?
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