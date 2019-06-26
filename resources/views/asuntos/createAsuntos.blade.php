@extends('layouts.nav-administrador')
@section('content')
	<div class="container">
		<script>
			function borrar($id){
				location.href = "/asuntos/destroy/"+$id;
			}
		</script>
		<h1>Asuntos</h1>


		<form class="form-inline" method="post" action="/asuntos/store">
			{{ csrf_field() }}
			<label for="asunto"></label>
			<input type="text" name="asunto" placeholder="Nuevo Asunto" class="form-control col-md-6" required="true">	
			<button type="submit" class="btn btn-success" style="margin-left: 5px">
			<span style="color:#fff">
				<i class="icono-action fa fa-plus" 
					style="color:#fff; font-size:12px">
				</i> Agregar
			</span>
		</button>
		</form>

		<div class="mcard card">
			@if($numAsuntos===0)
				<div class="alert alert-danger alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>No hay asuntos</strong> 
				</div>
				
			@else
				<div class="asuntos-container">
					@foreach ($asuntos as $asunto)
					<div class="mAsunto alert alert-primary alert-dismissible">
						<button type="button" data-dismiss="alert" class="mClose" onClick="borrar({{$asunto->id}})">&times;</button>
						<strong>{{$asunto->nombre_asunto}}</strong>
					</div>

					@endforeach
				</div>
				
			@endif

		</div>
	
		

		

	</div>


	
@endsection