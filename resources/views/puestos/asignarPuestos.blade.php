@extends('layouts.nav-administrador')
@section('content')
<script>

  $(document).ready(function() {
  
  });

  function allowDrop(ev) {
    ev.preventDefault();
  }

  function drag(ev,oficinistaId) {
    ev.dataTransfer.setData("text", ev.target.id);
    ev.dataTransfer.setData("oficinistaId",oficinistaId);
  }

  function drop(ev,id,puestoId) {

    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var oficinistaId = ev.dataTransfer.getData("oficinistaId");

    if ( $('#'+id).children().length > 0 ) {
     
    }else{
      ev.target.appendChild(document.getElementById(data));

      $.post("/puestos/AsignarPuestos/update",{
        oficinistaId: oficinistaId,
        puestoId: puestoId,
        '_token': $('meta[name=csrf-token]').attr('content')
        },function(data, status){
           location.href = "/puestos/AsignarPuestos/";
      });

   }
  }

  function desasignar(puestoId,oficinistaId){
  
   $.post("/puestos/desAsignarPuestos",{
      oficinistaId: oficinistaId,
      puestoId: puestoId,
      '_token': $('meta[name=csrf-token]').attr('content')
      },function(data, status){
         location.href = "/puestos/AsignarPuestos/";
     
    });
  }
  
</script>

<div class="container">
  <h1 class="text-secondary">Asignar puestos</h1>
  <div class="oficinistas-container">

  @foreach ($oficinistas as $oficinista) 

    <div id='{{"oficinista".$oficinista->id}}' class="card drag-container" draggable="true" ondragstart="drag(event,{{$oficinista->id}})" >
   
        @if($oficinista->genero =="Masculino")
          <div class="oficinista-img-male"></div>
        @else
          <div class="oficinista-img-female"></div>
        @endif
        @if(strlen($oficinista->nombre)>20)
            <h3 id="oficicinsta-title">{{substr($oficinista->nombre, 0, 20)}}....</h3>

        @else
            <h3 id="oficicinsta-title">{{$oficinista->nombre}}</h3>
        @endif
     
    </div>

  @endforeach
  
    
  </div>
  
  
  <div class="puestos-container">
    
  @foreach ($puestos as $puesto)

    <div id='{{"Puesto".$puesto->id}}' class="card drop-container" >
      <h3 id="puesto-title">Puesto{{$puesto->numero}}</h3>
      <div id='{{"ImagePuesto".$puesto->id}}' class="puesto-img" ondrop="drop(event,this.id,{{$puesto->id}})" ondragover="allowDrop(event)">
        @if ($puesto->oficinista !=null)
            <div id="drag1" class="card drag-container" draggable="true" ondragstart="drag(event,{{$puesto->oficinistaId}})" >
             
                 @if($puesto->oficinistaGenero =="Masculino")
                    <div class="oficinista-img-male"></div>
                  @else
                    <div class="oficinista-img-female"></div>
                  @endif
          
           <!--  <h3 id="oficicinsta-title">{{$puesto->oficinista}}</h3>  -->
           @if(strlen($puesto->oficinista)>20)
            <h3 id="oficicinsta-title">{{substr($puesto->oficinista, 0, 20)}}....</h3>

           @else
            <h3 id="oficicinsta-title">{{$puesto->oficinista}}</h3>
           @endif
          
          </div>
        @endif

      </div>
      @if ($puesto->oficinista !=null)
        <button  class ="btn btn-danger" onclick="desasignar({{$puesto->id}},{{$puesto->oficinistaId}})" id="desAsignar">Desasignar</button>
      @endif 
    </div>
    

  @endforeach
   
   </div>
</div>

@endsection

