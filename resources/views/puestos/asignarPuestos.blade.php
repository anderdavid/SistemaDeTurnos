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
      <div id="drag1" class="card drag-container" draggable="true" ondragstart="drag(event)" >
          <div class="oficinista-img"></div>
          <h3 id="oficicinsta-title">Alice</h3> 
      </div>
       <div id="drag1" class="card drag-container" draggable="true" ondragstart="drag(event)" >
          <div class="oficinista-img"></div>
          <h3 id="oficicinsta-title">Alice</h3> 
      </div>
       <div id="drag1" class="card drag-container" draggable="true" ondragstart="drag(event)" >
          <div class="oficinista-img"></div>
          <h3 id="oficicinsta-title">Alice</h3> 
      </div>
       <div id="drag1" class="card drag-container" draggable="true" ondragstart="drag(event)" >
          <div class="oficinista-img"></div>
          <h3 id="oficicinsta-title">Alice</h3> 
      </div>
       <div id="drag1" class="card drag-container" draggable="true" ondragstart="drag(event)" >
          <div class="oficinista-img"></div>
          <h3 id="oficicinsta-title">Alice</h3> 
      </div>
    </div>


    <div class="puestos-container">
      <div id="div1" class="card drop-container" >
         <h3 id="puesto-title">Puesto1</h3>
         <div class="puesto-img" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
      </div>
       <div id="div2" class="card drop-container" >
         <h3 id="puesto-title">Puesto2</h3>
         <div class="puesto-img" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
      </div>
       <div id="div3" class="card drop-container" >
         <h3 id="puesto-title">Puesto3</h3>
         <div class="puesto-img" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
      </div>
       <div id="div4" class="card drop-container" >
         <h3 id="puesto-title">Puesto4</h3>
         <div class="puesto-img" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
      </div>
       <div id="div5" class="card drop-container" >
         <h3 id="puesto-title">Puesto5</h3>
         <div class="puesto-img" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
      </div>
    
    </div>

  </div>

@endsection