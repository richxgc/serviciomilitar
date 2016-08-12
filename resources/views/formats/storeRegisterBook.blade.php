@extends('layouts.app')

@include('common.navbar')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h4><i class="fa fa-edit"></i> Capturar datos para el libro de registro</h4>
			<p>Los datos marcados con <span class="text-danger">*</span> son requeridos. La captura de datos es en formato abierto para que se adecue a sus necesidades.</p>
		</div>
		<form action="{{ route('storeRegisterBook') }}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="book_id" value="{{ $response->book->id or '' }}">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">Datos del libro de registro</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('class') ? ' has-error' : '' }}">
											<label for="class">Clase<span class="text-danger">*</span></label>
											<input type="text" name="class" id="class" class="form-control" value="{{ $response->book->class or old('class') }}" placeholder="Clase">
											@if($errors->has('class'))
											<span class="label label-danger">{{ $errors->first('class') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('local_board') ? ' has-error' : '' }}">
											<label for="local_board">Junta municipal<span class="text-danger">*</span></label>
											<input type="text" name="local_board" id="local_board" class="form-control" value="{{ $response->book->local_board or old('local_board') }}" placeholder="Junta municipal de reclutamiento">
											@if($errors->has('local_board'))
											<span class="label label-danger">{{ $errors->first('local_board') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('board_place') ? ' has-error' : '' }}">
											<label for="board_place">Lugar de la junta<span class="text-danger">*</span></label>
											<input type="text" name="board_place" id="board_place" class="form-control" value="{{ $response->book->board_place or old('board_place') }}" placeholder="Municipio de la junta de reclutamiento">
											@if($errors->has('board_place'))
											<span class="label label-danger">{{ $errors->first('board_place') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('president') ? ' has-error' : '' }}">
											<label for="president">Presidente de la J.M.R<span class="text-danger">*</span></label>
											<input type="text" name="president" id="president" class="form-control" value="{{ $response->book->president or old('president') }}" placeholder="Nombre completo del presidente">
											@if($errors->has('president'))
											<span class="label label-danger">{{ $errors->first('president') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('date_place') ? ' has-error' : '' }}">
											<label for="date_place">Lugar y Fecha<span class="text-danger">*</span></label>
											<input type="text" name="date_place" id="date_place" class="form-control" value="{{ $response->book->date_place or old('date_place') }}" placeholder="Lugar y fecha con letra">
											@if($errors->has('date_place'))
											<span class="label label-danger">{{ $errors->first('date_place') }}</span>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Acciones</div>
					<div class="panel-body">
						<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Guardar datos</button>
						<a href="{{ route('listRegisterBooks') }}" class="btn btn-default btn-block"><i class="fa fa-arrow-left"></i> Regresar</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection