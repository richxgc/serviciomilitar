@extends('layouts.app')

@include('common.navbar')

@section('content')
<div class="container-fluid">
	<div class="row">
		@if($response->militants->count() == 0)
		<br><br>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Lista de militantes</div>
				<div class="panel-body">
					Aún no has dado de alta ningún militante de servicio militar, ve a la sección <a href="{{ route('createMilitant') }}">"Militantes -> Capturar Nuevo"</a> para generar un nuevo registro.
				</div>
			</div>
		</div>
		@else
		<div class="col-md-12">
			<h4><i class="fa fa-list"></i> Lista de militantes</h4>
			<a href="{{ route('createMilitant') }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Capturar nuevo</a>
		</div>
		<div class="col-md-12">
			<br>
			<span>Codigos de colores:</span>
			<span class="text-success">Expedida</span> |
			<span class="text-warning">Inutilizada</span> |
			<span class="text-danger">Extraviada</span>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>Clase</th>
							<th>Presenta</th>
							<th>Matricula</th>
							<th>CURP</th>
							<th>Nombre(s)</th>
							<th>Apellido paterno</th>
							<th>Apellido materno</th>
							<th>Fecha de nacimiento</th>
							<th>Cartilla</th>
							<th>Ver / Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($response->militants as $militant)
						@if($militant->passbook_issued == 1)
						<tr class="success">
						@elseif($militant->passbook_disabled == 1)
						<tr class="warning">
						@elseif($militant->passbook_lost == 1)
						<tr class="danger">
						@else
						<tr>
						@endif
							<td>{{ $militant->id }}</td>
							<td>{{ $militant->class }}</td>
							<td>{{ $militant->presented_class }}</td>
							<td>{{ $militant->enrollment }}</td>
							<td>{{ $militant->curp }}</td>
							<td>{{ $militant->first_name }}</td>
							<td>{{ $militant->last_name_a }}</td>
							<td>{{ $militant->last_name_b }}</td>
							<td>{{ $militant->birthday }}</td>
							<td><a href="{{ route('printMilitaryId', ['id' => $militant->id]) }}" class="btn btn-default btn-block" target="_blank"><i class="fa fa-print"></i></a></td>
							<td><a href="{{ route('editMilitant', ['id' => $militant->id]) }}" class="btn btn-default btn-block"><i class="fa fa-eye"></i></a></td>
							<td><a href="{{ route('deleteMilitant', ['id' => $militant->id]) }}" class="btn btn-danger btn-block"><i class="fa fa-trash"></i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			{{ $response->militants->links() }}
		</div>
		@endif
	</div>
</div>
@endsection
