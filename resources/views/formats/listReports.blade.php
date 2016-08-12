@extends('layouts.app')

@include('common.navbar')

@section('content')
<div class="container-fluid">
	<div class="row">
		@if($response->reports->count() == 0)
		<br><br>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Reportes mensuales y anuales</div>
				<div class="panel-body">
					Aún no has dado de alta ningún reporte, da clic <a href="{{ route('createReport') }}">aquí</a> para generar uno nuevo.
				</div>
			</div>
		</div>
		@else
		<div class="col-md-12">
			<h4><i class="fa fa-list"></i> Reportes mensuales y anuales</h4>
			<a href="{{ route('createReport') }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Capturar nuevo reporte</a>
		</div>
		<div class="col-md-12">
		<br>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>Clase</th>
							<th>Inicio</th>
							<th>Termino</th>
							<th>Imprimir</th>
							<th>Ver / Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($response->reports as $report)
						<tr>
							<td>{{ $report->id }}</td>
							<td>{{ $report->class }}</td>
							<td>{{ substr($report->start, 0, 10) }}</td>
							<td>{{ substr($report->end, 0, 10) }}</td>
							<td><a href="{{ route('printReport', ['id' => $report->id]) }}" class="btn btn-default btn-block" target="_blank"><i class="fa fa-print"></i></a></td>
							<td><a href="{{ route('editReport', ['id' => $report->id]) }}" class="btn btn-default btn-block"><i class="fa fa-eye"></i></a></td>
							<td><a href="{{ route('deleteReport', ['id' => $report->id]) }}" class="btn btn-danger btn-block"><i class="fa fa-trash"></i></a></td>
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