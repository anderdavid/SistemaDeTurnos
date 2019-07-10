@extends('layouts.nav-administrador')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/asignarPuestos.css') }}">
<script>
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

<div class="container">
	
	<h1 class="text-secondary">Asignar Puestos</h1><br>
	<div class="row">
		<div class="col bg-success">
			<div class="puestos-container">
				@foreach ($puestos as $puesto)
				<div id='{{"drag".$puesto->id}}' class="blue" style="background-color: blue; width: 100px; height: 100px"  ondrop="drop(event)" ondragover="allowDrop(event)">
					<p>{{$puesto->numero}}</p>
				</div>
				
				<br>
				@endforeach
			</div>
		</div>

		<div class="col bg-warning">
			<div class="oficinistas-container">
				@foreach ($oficinistas as $oficinista)
				<div id='{{"drop".$oficinista->id}}' class="red" style="background-color: red; width: 100px; height: 100px" draggable="true" ondragstart="drag(event)">
					<p>{{$oficinista->nombre}}</p>
				</div>
				
				<br>
				@endforeach
			</div>
		</div>
	</div>
</div>

{{json_encode($oficinistas)}}<br>
{{json_encode($puestos)}}
@endsection