@extends('layouts.app')

@include('common.navbar')

@section('content')
<div class="container-fluid">
	<div class="row">
		@if($response->docs->count() == 0)
		<br><br>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Actas de inutilización y extravío</div>
				<div class="panel-body">
					Aún no has dado de alta ninguna acta de inutilización o extravío, da clic <a href="{{ route('createDisabledLost') }}">aquí</a> para generar una nueva.
				</div>
			</div>
		</div>
		@else
		<div class="col-md-12">
			<h4><i class="fa fa-list"></i> Actas de inutilización y extravío</h4>
			<a href="{{ route('createDisabledLost') }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Capturar nueva acta</a>
		</div>
		<div class="col-md-12">
			<br>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>Clase</th>
							<th>Matrícula</th>
							<th>Lugar</th>
							<th>Fecha</th>
							<th>Tipo</th>
							<th>Imprimir</th>
							<th>Ver / Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($response->docs as $doc)
						<tr>
							<td>{{ $doc->id }}</td>
							<td>{{ $doc->class }}</td>
							<td>{{ $doc->enrollment }}</td>
							<td>{{ $doc->place }}</td>
							<td>{{ $doc->date }}</td>
							@if($doc->type == '1')
							<td>Inutilización</td>
							@else
							<td>Extravío</td>
							@endif
							@if($doc->type == '1')
							<td><a href="{{ route('printDisabled', ['id' => $doc->id]) }}" class="btn btn-default btn-block" target="_blank"><i class="fa fa-print"></i></a></td>
							@else
							<td><a href="{{ route('printLost', ['id' => $doc->id]) }}" class="btn btn-default btn-block" target="_blank"><i class="fa fa-print"></i></a></td>
							@endif
							<td><a href="{{ route('editDisabledLost', ['id' => $doc->id]) }}" class="btn btn-default btn-block"><i class="fa fa-eye"></i></a></td>
							<td><a href="{{ route('deleteDisabledLost', ['id' => $doc->id]) }}" class="btn btn-danger btn-block"><i class="fa fa-trash"></i></a></td>
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