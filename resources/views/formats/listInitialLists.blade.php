@extends('layouts.app')

@include('common.navbar')

@section('content')
<div class="container-fluid">
	<div class="row">
		@if($response->lists->count() == 0)
		<br><br>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Listas de sorteo</div>
				<div class="panel-body">
					Aún no has dado de alta ninguna lista inicial de sorteo, da clic <a href="{{ route('createInitialList') }}">aquí</a> para generar uno nuevo.
				</div>
			</div>
		</div>
		@else
		<div class="col-md-12">
			<h4><i class="fa fa-list"></i> Listas de sorteo</h4>
			<a href="{{ route('createInitialList') }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Capturar nueva lista</a>
		</div>
		<div class="col-md-12">
			<br>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>Clase</th>
							<th>Lugar y Fecha</th>
							<th>Lista Inicial</th>
							<th>Lista "UNO"</th>
							<th>Lista "UNO" (BIS)</th>
							<th>Lista "DOS"</th>
							<th>Ver / Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($response->lists as $list)
						<tr>
							<td>{{ $list->id }}</td>
							<td>{{ $list->class }}</td>
							<td>{{ $list->date_place }}</td>
							<td><a href="{{ route('printInitialList', ['id' => $list->id]) }}" class="btn btn-default btn-block" target="_blank"><i class="fa fa-print"></i></a></td>
							<td><a href="{{ route('printOneList', ['id' => $list->id]) }}" class="btn btn-default btn-block" target="_blank"><i class="fa fa-print"></i></a></td>
							<td><a href="{{ route('printThreeList', ['id' => $list->id]) }}" class="btn btn-default btn-block" target="_blank"><i class="fa fa-print"></i></a></td>
							<td><a href="{{ route('printTwoList', ['id' => $list->id]) }}" class="btn btn-default btn-block" target="_blank"><i class="fa fa-print"></i></a></td>
							<td><a href="{{ route('editInitialList', ['id' => $list->id]) }}" class="btn btn-default btn-block"><i class="fa fa-eye"></i></a></td>
							<td><a href="{{ route('deleteInitialList', ['id' => $list->id]) }}" class="btn btn-danger btn-block"><i class="fa fa-trash"></i></a></td>
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