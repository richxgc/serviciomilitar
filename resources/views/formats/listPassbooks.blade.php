@extends('layouts.app')

@include('common.navbar')

@section('content')
<div class="container-fluid">
	<div class="row">
		@if($response->passbooks->count() == 0)
		<br><br>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Lista de balance de cartillas</div>
				<div class="panel-body">
					Aún no has dado de alta ningún balance de cartillas, da clic <a href="{{ route('createPassbook') }}">aquí</a> para generar uno nuevo.
				</div>
			</div>
		</div>
		@else
		<div class="col-md-12">
			<h4><i class="fa fa-list"></i> Lista de balance de cartillas</h4>
			<a href="{{ route('createPassbook') }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Capturar nuevo balance</a>
		</div>
		<div class="col-md-12">
			<br>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>Clase</th>
							<th>Cartillas ministradas</th>
							<th>Cartillas expedidas</th>
							<th>Cartillas sobrantes</th>
							<th>Sumas iguales</th>
							<th>Imprimir</th>
							<th>Ver / Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($response->passbooks as $passbook)
						<tr>
							<td>{{ $passbook->id }}</td>
							<td>{{ $passbook->class }}</td>
							<td>{{ $passbook->start_ministered.'-'.$passbook->end_ministered }}</td>
							<td>{{ $passbook->start_issued.'-'.$passbook->end_issued }}</td>
							<td>{{ $passbook->start_leftover.'-'.$passbook->end_leftover }}</td>
							<td>{{ $passbook->equal_plus }}</td>
							<td><a href="{{ route('printPassbook', ['id' => $passbook->id]) }}" class="btn btn-default btn-block" target="_blank"><i class="fa fa-print"></i></a></td>
							<td><a href="{{ route('editPassbook', ['id' => $passbook->id]) }}" class="btn btn-default btn-block"><i class="fa fa-eye"></i></a></td>
							<td><a href="{{ route('deletePassbook', ['id' => $passbook->id]) }}" class="btn btn-danger btn-block"><i class="fa fa-trash"></i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		@endif
	</div>
</div>
@endsection