@extends('layouts.app')

@include('common.navbar')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h4><i class="fa fa-edit"></i> Capturar datos del reporte</h4>
			<p>Los datos marcados con <span class="text-danger">*</span> son requeridos. La captura de datos es en formato abierto para que se adecue a sus necesidades.</p>
		</div>
		<form action="{{ route('storeReport') }}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="report_id" value="{{ $response->report->id or '' }}">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">Datos del reporte</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('class') ? ' has-error' : '' }}">
											<label for="class">Clase<span class="text-danger">*</span></label>
											<input type="text" name="class" id="class" class="form-control" value="{{ $response->report->class or old('class') }}" placeholder="Clase">
											@if($errors->has('class'))
											<span class="label label-danger">{{ $errors->first('class') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('start') ? ' has-error' : '' }}">
											<label for="start">Fecha inicio del reporte<span class="text-danger">*</span></label>
											@if($response->report->start != null)
											<?php $d_start = substr($response->report->start, 0, 10) ?>
											<input type="date" name="start" id="start" class="form-control" value="{{ $d_start }}">
											@elseif(old('start'))
											<input type="date" name="start" id="start" class="form-control" value="{{ old('start') }}">
											@else
											<input type="date" name="start" id="start" class="form-control">
											@endif
											@if($errors->has('start'))
											<span class="label label-danger">{{ $errors->first('start') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('end') ? ' has-error' : '' }}">
											<label for="end">Fecha fin del reporte<span class="text-danger">*</span></label>
											@if($response->report->end != null)
											<?php $d_end = substr($response->report->end, 0, 10) ?>
											<input type="date" name="end" id="end" class="form-control" value="{{ $d_end }}">
											@elseif(old('end'))
											<input type="date" name="end" id="end" class="form-control" value="{{ old('end') }}">
											@else
											<input type="date" name="end" id="end" class="form-control">
											@endif
											@if($errors->has('end'))
											<span class="label label-danger">{{ $errors->first('end') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('local_board') ? ' has-error' : '' }}">
											<label for="local_board">Junta municipal<span class="text-danger">*</span></label>
											<input type="text" name="local_board" id="local_board" class="form-control" value="{{ $response->report->local_board or old('local_board') }}" placeholder="Junta municipal de reclutamiento">
											@if($errors->has('local_board'))
											<span class="label label-danger">{{ $errors->first('local_board') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('board_place') ? ' has-error' : '' }}">
											<label for="board_place">Lugar de la junta<span class="text-danger">*</span></label>
											<input type="text" name="board_place" id="board_place" class="form-control" value="{{ $response->report->board_place or old('board_place') }}" placeholder="Municipio de la junta de reclutamiento">
											@if($errors->has('board_place'))
											<span class="label label-danger">{{ $errors->first('board_place') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('president') ? ' has-error' : '' }}">
											<label for="president">Presidente de la J.M.R<span class="text-danger">*</span></label>
											<input type="text" name="president" id="president" class="form-control" value="{{ $response->report->president or old('president') }}" placeholder="Nombre completo del presidente">
											@if($errors->has('president'))
											<span class="label label-danger">{{ $errors->first('president') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('date_place') ? ' has-error' : '' }}">
											<label for="date_place">Lugar y Fecha<span class="text-danger">*</span></label>
											<input type="text" name="date_place" id="date_place" class="form-control" value="{{ $response->report->date_place or old('date_place') }}" placeholder="Lugar y fecha con letra">
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
						<a href="{{ route('listReports') }}" class="btn btn-default btn-block"><i class="fa fa-arrow-left"></i> Regresar</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection