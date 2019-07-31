@extends('layouts.nav-administrador')
@section('content')

<script type="text/javascript">
	$(document).ready(function() {

	});

	function allowDrop(ev) {
		ev.preventDefault();
	}

	function drag(ev) {
		ev.dataTransfer.setData("text", ev.target.id);
	}

	function drop(ev) {
		ev.preventDefault();
		var data = ev.dataTransfer.getData("text");
		ev.target.appendChild(document.getElementById(data));
	}


</script>

<script type="text/javascript">
	var puestoSelect="";

	function selectPuesto(sel){
		location.href ="/asuntos/asignarAsuntos/"+sel.value;
	}
</script>

<div class="container">
	<h1>Asignar Asuntos</h1>
	
	<div class="row">
		<div class="form-group col-md-2">
			<form>
				<label for="puestos1">Puestos:</label>
				<select id="puestos" name="idPuesto" class="form-control" onchange="selectPuesto(this)">

					@foreach ($puestos as $puesto)
					@if ($puesto->id == $puestoSeleccionadoId)
					<option value="{{$puesto->id}}" selected="true">Puesto {{$puesto->numero}}</option>
					@else
					<option value="{{$puesto->id}}">Puesto {{$puesto->numero}}</option>
					@endif
					@endforeach
				</select>
			</form>
		</div>
		<div class="col-md-2">
			
		</div>
		<div class="col-md-8 card">
			<div class="card drop-container">
				<h3 id="puesto-title">Puesto {{$puestoSeleccionado->numero}}</h3>
				<div class="puesto-img">
			 		@if ($puestoSeleccionado->oficinista !=null)
			 		<div id="drag1" class="card drag-container">

			 			@if($puestoSeleccionado->oficinistaGenero =="Masculino")
			 			<div class="oficinista-img-male"></div>
			 			@else
			 			<div class="oficinista-img-female"></div>
			 			@endif

			 			<h3 id="oficicinsta-title">{{$puestoSeleccionado->oficinista}}</h3> 
			 		</div>
			 		@endif

			 	</div> 
			</div>

			<div class="mcard card">
				<div id="asuntos-drop" class="asuntos-container" ondrop="drop(event)" ondragover="allowDrop(event)">
					@foreach ($puestoAsuntos->asuntos as $asunto)
					  <div class="mAsunto alert alert-primary alert-dismissible">
						<button type="button"  class="mClose">&times;</button>
						<strong>Sacar al perro</strong>
					  </div>
					@endforeach
					
				</div>
				
			</div>
		</div>

		
	</div>

	<div class="mcard card">
		@if($numAsuntos===0)
			<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>No hay asuntos</strong> 
			</div>
			
		@else
			<div class="asuntos-container">
				@foreach ($asuntos as $asunto)
				<div id='{{"asunto-drag".$asunto->id}}' class="mAsunto alert alert-primary alert-dismissible" draggable="true" ondragstart="drag(event)">
					<button type="button"  class="mClose">&times;</button>
					<strong>{{$asunto->nombre_asunto}}</strong>
				</div>

				@endforeach
			</div>
			
		@endif

	</div>

</div>
@endsection