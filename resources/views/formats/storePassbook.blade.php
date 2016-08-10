@extends('layouts.app')

@include('common.navbar')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h4><i class="fa fa-edit"></i> Capturar balance de cartillas</h4>
			<p>Los datos marcados con <span class="text-danger">*</span> son requeridos. La captura de datos es en formato abierto para que se adecue a sus necesidades.</p>
		</div>
		<form action="{{ route('storePassbook') }}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="passbook_id" value="{{ $response->passbook->id or '' }}">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">Datos del balance</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('class') ? ' has-error' : '' }}">
											<label for="class">Clase<span class="text-danger">*</span></label>
											<input type="text" name="class" id="class" class="form-control" value="{{ $response->passbook->class or old('class') }}" placeholder="Clase">
											@if($errors->has('class'))
											<span class="label label-danger">{{ $errors->first('class') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('local_board') ? ' has-error' : '' }}">
											<label for="local_board">Junta municipal<span class="text-danger">*</span></label>
											<input type="text" name="local_board" id="local_board" class="form-control" value="{{ $response->passbook->local_board or old('local_board') }}" placeholder="Junta municipal de reclutamiento">
											@if($errors->has('local_board'))
											<span class="label label-danger">{{ $errors->first('local_board') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('board_place') ? ' has-error' : '' }}">
											<label for="board_place">Lugar de la junta<span class="text-danger">*</span></label>
											<input type="text" name="board_place" id="board_place" class="form-control" value="{{ $response->passbook->board_place or old('board_place') }}" placeholder="Municipio de la junta de reclutamiento">
											@if($errors->has('board_place'))
											<span class="label label-danger">{{ $errors->first('board_place') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('militar_zone') ? ' has-error' : '' }}">
											<label for="militar_zone">Zona militar<span class="text-danger">*</span></label>
											<input type="text" name="militar_zone" id="militar_zone" class="form-control" value="{{ $response->passbook->militar_zone or old('militar_zone') }}" placeholder="__\a">
											@if($errors->has('militar_zone'))
											<span class="label label-danger">{{ $errors->first('militar_zone') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('president') ? ' has-error' : '' }}">
											<label for="president">Presidente de la J.M.R<span class="text-danger">*</span></label>
											<input type="text" name="president" id="president" class="form-control" value="{{ $response->passbook->president or old('president') }}" placeholder="Nombre completo del presidente">
											@if($errors->has('president'))
											<span class="label label-danger">{{ $errors->first('president') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('date_place') ? ' has-error' : '' }}">
											<label for="date_place">Lugar y Fecha<span class="text-danger">*</span></label>
											<input type="text" name="date_place" id="date_place" class="form-control" value="{{ $response->passbook->date_place or old('date_place') }}" placeholder="Lugar y fecha con letra">
											@if($errors->has('date_place'))
											<span class="label label-danger">{{ $errors->first('date_place') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('start_ministered') ? ' has-error' : '' }}">
											<label for="start_ministered">Inicio cartillas ministradas<span class="text-danger">*</span></label>
											<input type="text" name="start_ministered" id="start_ministered" class="form-control" value="{{ $response->passbook->start_ministered or old('start_ministered') }}" placeholder="De la...">
											@if($errors->has('start_ministered'))
											<span class="label label-danger">{{ $errors->first('start_ministered') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('end_ministered') ? ' has-error' : '' }}">
											<label for="end_ministered">Fin cartillas ministradas<span class="text-danger">*</span></label>
											<input type="text" name="end_ministered" id="end_ministered" class="form-control" value="{{ $response->passbook->end_ministered or old('end_ministered') }}" placeholder="A la...">
											@if($errors->has('end_ministered'))
											<span class="label label-danger">{{ $errors->first('end_ministered') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('start_issued') ? ' has-error' : '' }}">
											<label for="start_issued">Inicio cartillas expedidas<span class="text-danger">*</span></label>
											<input type="text" name="start_issued" id="start_issued" class="form-control" value="{{ $response->passbook->start_issued or old('start_issued') }}" placeholder="De la...">
											@if($errors->has('start_issued'))
											<span class="label label-danger">{{ $errors->first('start_issued') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('end_issued') ? ' has-error' : '' }}">
											<label for="end_issued">Fin cartillas expedidas<span class="text-danger">*</span></label>
											<input type="text" name="end_issued" id="end_issued" class="form-control" value="{{ $response->passbook->end_issued or old('end_issued') }}" placeholder="A la...">
											@if($errors->has('end_issued'))
											<span class="label label-danger">{{ $errors->first('end_issued') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('disabled') ? ' has-error' : '' }}">
											<label for="disabled">Inutilizadas<span class="text-danger">*</span></label>
											<input type="text" name="disabled" id="disabled" class="form-control" value="{{ $response->passbook->disabled or old('disabled') }}" placeholder="Anotar las matrículas">
											@if($errors->has('disabled'))
											<span class="label label-danger">{{ $errors->first('disabled') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('lost') ? ' has-error' : '' }}">
											<label for="lost">Extraviadas<span class="text-danger">*</span></label>
											<input type="text" name="lost" id="lost" class="form-control" value="{{ $response->passbook->lost or old('lost') }}" placeholder="Anotar las matrículas">
											@if($errors->has('lost'))
											<span class="label label-danger">{{ $errors->first('lost') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('start_leftover') ? ' has-error' : '' }}">
											<label for="start_leftover">Inicio cartillas sobrantes<span class="text-danger">*</span></label>
											<input type="text" name="start_leftover" id="start_leftover" class="form-control" value="{{ $response->passbook->start_leftover or old('start_leftover') }}" placeholder="De la...">
											@if($errors->has('start_leftover'))
											<span class="label label-danger">{{ $errors->first('start_leftover') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('end_leftover') ? ' has-error' : '' }}">
											<label for="end_leftover">Fin cartillas sobrantes<span class="text-danger">*</span></label>
											<input type="text" name="end_leftover" id="end_leftover" class="form-control" value="{{ $response->passbook->end_leftover or old('end_leftover') }}" placeholder="A la...">
											@if($errors->has('end_leftover'))
											<span class="label label-danger">{{ $errors->first('end_leftover') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('equal_plus') ? ' has-error' : '' }}">
											<label for="equal_plus">Sumas iguales<span class="text-danger">*</span></label>
											<input type="text" name="equal_plus" id="equal_plus" class="form-control" value="{{ $response->passbook->equal_plus or old('equal_plus') }}" placeholder="A la...">
											@if($errors->has('equal_plus'))
											<span class="label label-danger">{{ $errors->first('equal_plus') }}</span>
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
						<a href="{{ route('listPassbooks') }}" class="btn btn-default btn-block"><i class="fa fa-arrow-left"></i> Regresar</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection