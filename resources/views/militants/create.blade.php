@extends('layouts.app')

@include('common.navbar')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h4><i class="fa fa-edit"></i> Capturar nuevo militante</h4>
			<p>Los datos marcados con <span class="text-danger">*</span> son requeridos para generar un nuevo registro de militante.</p>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">Militante</div>
				<div class="panel-body">
					Bienvenido, en el menú superior encontrás las opciones para capturar nuevos militantes, así como ver una lista de todos ellos e imprimir los formatos que requieras.
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">Padres</div>
				<div class="panel-body">
					Bienvenido, en el menú superior encontrás las opciones para capturar nuevos militantes, así como ver una lista de todos ellos e imprimir los formatos que requieras.
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">Dirección</div>
				<div class="panel-body">
					Bienvenido, en el menú superior encontrás las opciones para capturar nuevos militantes, así como ver una lista de todos ellos e imprimir los formatos que requieras.
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
