@extends('layouts.app')

@include('common.navbar')

@section('content')
<div class="container-fluid">
	<div class="row">
		@if($response->books->count() == 0)
		<br><br>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Libros de registro</div>
				<div class="panel-body">
					Aún no has dado de alta ningún libro de registro, da clic <a href="{{ route('createRegisterBook') }}">aquí</a> para generar uno nuevo.
				</div>
			</div>
		</div>
		@else
		<div class="col-md-12">
			<h4><i class="fa fa-list"></i> Libros de registro</h4>
			<a href="{{ route('createRegisterBook') }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Capturar nuevo libro</a>
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
							<th>Imprimir</th>
							<th>Ver / Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($response->books as $book)
						<tr>
							<td>{{ $book->id }}</td>
							<td>{{ $book->class }}</td>
							<td>{{ $book->date_place }}</td>
							<td><a href="{{ route('printRegisterBook', ['id' => $book->id]) }}" class="btn btn-default btn-block" target="_blank"><i class="fa fa-print"></i></a></td>
							<td><a href="{{ route('editRegisterBook', ['id' => $book->id]) }}" class="btn btn-default btn-block"><i class="fa fa-eye"></i></a></td>
							<td><a href="{{ route('deleteRegisterBook', ['id' => $book->id]) }}" class="btn btn-danger btn-block"><i class="fa fa-trash"></i></a></td>
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