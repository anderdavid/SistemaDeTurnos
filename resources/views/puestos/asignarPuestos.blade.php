@extends('layouts.nav-administrador')
@section('content')
	<h1>Asignar puestos</h1>
	<p>HELLO WORLD</p>
	<p>{{json_encode($puestos)}}</p>
	<p>{{json_encode($oficinistas)}}</p>
@endsection