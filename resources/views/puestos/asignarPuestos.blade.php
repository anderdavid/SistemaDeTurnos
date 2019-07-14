@extends('layouts.nav-administrador')
@section('content')
<script>

  $(document).ready(function() {
   /* alert('hello jquery');*/
  });

  function allowDrop(ev) {
    ev.preventDefault();
  }

  function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
  }

  function drop(ev,id) {

    ev.preventDefault();
   
    var data = ev.dataTransfer.getData("text");

   
    if ( $('#'+id).children().length > 0 ) {
     
    }else{
      ev.target.appendChild(document.getElementById(data));
    }


    

    //var drag=ev.target;
  
    

   /* ev.target.appendChild(document.getElementById(data));*/
  }


</script>

<p id="demo"></p>

<div class="container">
  <h1 class="text-secondary">Asignar puestos</h1>
  <div class="oficinistas-container">

  @foreach ($oficinistas as $oficinista) 

    <div id='{{"oficinista".$oficinista->id}}' class="card drag-container" draggable="true" ondragstart="drag(event)" >
      <div class="oficinista-img"></div>
      <h3 id="oficicinsta-title">{{$oficinista->nombre}}</h3> 
    </div>

  @endforeach
  
    
  </div>
  
  
  <div class="puestos-container">
    
  @foreach ($puestos as $puesto)

    <div id='{{"Puesto".$puesto->id}}' class="card drop-container" >
      <h3 id="puesto-title">Puesto{{$puesto->numero}}</h3>
      <div id='{{"ImagePuesto".$puesto->id}}' class="puesto-img" ondrop="drop(event,this.id)" ondragover="allowDrop(event)">
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

