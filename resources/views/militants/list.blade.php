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
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Clase</th>
							<th>Matricula</th>
							<th>CURP</th>
						</tr>
					</thead>
					<tbody>
						@foreach($response->militants as $militant)
						<tr>
							<td>{{ $militant->class }}</td>
							<td>{{ $militant->enrollment }}</td>
							<td>{{ $militant->curp }}</td>
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
