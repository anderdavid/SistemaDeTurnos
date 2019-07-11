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
  		 <div class="col-md-6 col-sm-6 col-lg-6">
  		 	<div  class="container-puestos">
  		 		<div id="div1" class="drop-image-puestos" ondrop="drop(event)" ondragover="allowDrop(event)">
  		 		</div>
  		 		<div class="oficina-info-container_1">
  		 			<p><span>Oficinista 1</span></p>
  		 			<p id="descripcion">Descripcion</p>
  		 		</div>
  		 	</div>
  		 	<div class="puesto-info-container">
  		 			<p><span>Puesto 1</span></p>
  		 			<p id="descripcion">Descripcion</p>
  		    </div>
  		 </div>
  		 <div class="col-md-6 col-sm-6 col-lg-6">
  		 	<div  id="drag1" class="container-oficinistas" draggable="true" ondragstart="drag(event)"></div>
  		 	<div class="oficina-info-container_2">
  		 			<p><span>Oficinista 1</span></p>
  		 			<p id="descripcion">Descripcion</p>
  		    </div>
  		 </div>
  	</div>
  </div>
@endsection