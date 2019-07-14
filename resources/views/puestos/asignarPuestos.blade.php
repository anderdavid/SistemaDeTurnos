@extends('layouts.nav-administrador')
@section('content')
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
  <h1 class="text-secondary">Asignar puestos</h1>
  <div class="oficinistas-container">

  @foreach ($oficinistas as $oficinista) 

    <div id="drag1" class="card drag-container" draggable="true" ondragstart="drag(event)" >
      <div class="oficinista-img"></div>
      <h3 id="oficicinsta-title">{{$oficinista->nombre}}</h3> 
    </div>

  @endforeach
  
    
  </div>
  
  
  <div class="puestos-container">
    
  @foreach ($puestos as $puesto)

    <div id='{{"Puesto".$puesto->id}}' class="card drop-container" >
      <h3 id="puesto-title">Puesto{{$puesto->numero}}</h3>
      <div class="puesto-img" ondrop="drop(event)" ondragover="allowDrop(event)">
        @if ($puesto->oficinista !=null)

          <div id="drag1" class="card drag-container" draggable="true" ondragstart="drag(event)" >
            <div class="oficinista-img"></div>
            <h3 id="oficicinsta-title">{{$puesto->oficinista}}</h3> 
          </div>
        @endif

      </div>
    </div> 

  @endforeach
   
   </div>
</div>



@endsection

