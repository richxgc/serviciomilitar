@extends('layouts.app')

@include('common.navbar')

@section('content')
<div class="container-fluid">
	<div class="row">
		@if($response->minutes->count() == 0)
		<br><br>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Lista de actas de sorteo</div>
				<div class="panel-body">
					Aún no has dado de alta ningún acta de sorteo, da clic <a href="{{ route('createMinuteDraw') }}">aquí</a> para generar una nueva acta.
				</div>
			</div>
		</div>
		@else
		<div class="col-md-12">
			<h4><i class="fa fa-list"></i> Lista de actas de sorteo</h4>
			<a href="{{ route('createMinuteDraw') }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Capturar nueva acta</a>
		</div>
		<div class="col-md-12">
			<br>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>Clase</th>
							<th>Fecha del sorteo</th>
							<th>Total militantes</th>
							<th>Faltistas</th>
							<th>Bola negra</th>
							<th>Bola blanca</th>
							<th>Imprimir</th>
							<th>Ver / Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($response->minutes as $minute)
						<tr>
							<td>{{ $minute->id }}</td>
							<td>{{ $minute->class }}</td>
							<td>{{ $minute->date_draw }}</td>
							<td>{{ $minute->total_militants }}</td>
							<td>{{ $minute->absence_militants }}</td>
							<td>{{ $minute->black_militants }}</td>
							<td>{{ $minute->white_militants }}</td>
							<td><a href="{{ route('printMinuteDraw', ['id' => $minute->id]) }}" class="btn btn-default btn-block" target="_blank"><i class="fa fa-print"></i></a></td>
							<td><a href="{{ route('editMinuteDraw', ['id' => $minute->id]) }}" class="btn btn-default btn-block"><i class="fa fa-eye"></i></a></td>
							<td><a href="{{ route('deleteMinuteDraw', ['id' => $minute->id]) }}" class="btn btn-danger btn-block"><i class="fa fa-trash"></i></a></td>
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