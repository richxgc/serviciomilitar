@extends('layouts.app')

@include('common.navbar')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h4><i class="fa fa-edit"></i> Capturar acta de sorteo</h4>
			<p>Los datos marcados con <span class="text-danger">*</span> son requeridos. La captura de datos es en formato abierto para que se adecue a sus necesidades.</p>
		</div>
		<form action="{{ route('storeMinuteDraw') }}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="minute_id" value="{{ $response->minute->id or '' }}">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">Datos de la acta</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('class') ? ' has-error' : '' }}">
											<label for="class">Clase<span class="text-danger">*</span></label>
											<input type="text" name="class" id="class" class="form-control" value="{{ $response->minute->class or old('class') }}" placeholder="Clase">
											@if($errors->has('class'))
											<span class="label label-danger">{{ $errors->first('class') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('place_draw') ? ' has-error' : '' }}">
											<label for="place_draw">Lugar del sorteo<span class="text-danger">*</span></label>
											<input type="text" name="place_draw" id="place_draw" class="form-control" value="{{ $response->minute->place_draw or old('place_draw') }}" placeholder="Lugar con letra (plaza)">
											@if($errors->has('place_draw'))
											<span class="label label-danger">{{ $errors->first('place_draw') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('date_draw') ? ' has-error' : '' }}">
											<label for="date_draw">Fecha del sorteo<span class="text-danger">*</span></label>
											<input type="text" name="date_draw" id="date_draw" class="form-control" value="{{ $response->minute->date_draw or old('date_draw') }}" placeholder="Dia, mes y año con letra">
											@if($errors->has('date_draw'))
											<span class="label label-danger">{{ $errors->first('date_draw') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('persons_involved') ? ' has-error' : '' }}">
											<label for="persons_involved">Personas que intervinieron<span class="text-danger">*</span></label>
											<input type="text" name="persons_involved" id="persons_involved" class="form-control" value="{{ $response->minute->persons_involved or old('persons_involved') }}" placeholder="Nombres y cargos de las personas que intervienen en el acto">
											@if($errors->has('persons_involved'))
											<span class="label label-danger">{{ $errors->first('persons_involved') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('local_board') ? ' has-error' : '' }}">
											<label for="local_board">Junta municipal de reclutamiento<span class="text-danger">*</span></label>
											<input type="text" name="local_board" id="local_board" class="form-control" value="{{ $response->minute->local_board or old('local_board') }}" placeholder="Lugar con letra (municipio)">
											@if($errors->has('local_board'))
											<span class="label label-danger">{{ $errors->first('local_board') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('soldiers_involved') ? ' has-error' : '' }}">
											<label for="soldiers_involved">Soldados elegidos<span class="text-danger">*</span></label>
											<input type="text" name="soldiers_involved" id="soldiers_involved" class="form-control" value="{{ $response->minute->soldiers_involved or old('soldiers_involved') }}" placeholder="Nombres y apellidos de los mismos">
											@if($errors->has('soldiers_involved'))
											<span class="label label-danger">{{ $errors->first('soldiers_involved') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('kid') ? ' has-error' : '' }}">
											<label for="kid">Niño(a)<span class="text-danger">*</span></label>
											<input type="text" name="kid" id="kid" class="form-control" value="{{ $response->minute->kid or old('kid') }}" placeholder="Nombre(s) y apellidos">
											@if($errors->has('kid'))
											<span class="label label-danger">{{ $errors->first('kid') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('total_militants') ? ' has-error' : '' }}">
											<label for="total_militants">Total de militantes<span class="text-danger">*</span></label>
											<input type="number" name="total_militants" id="total_militants" class="form-control" value="{{ $response->minute->total_militants or old('total_militants') }}" placeholder="Cantidad de militantes registrados">
											@if($errors->has('total_militants'))
											<span class="label label-danger">{{ $errors->first('total_militants') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('absence_militants') ? ' has-error' : '' }}">
											<label for="absence_militants">Cantidad faltistas<span class="text-danger">*</span></label>
											<input type="number" name="absence_militants" id="absence_militants" class="form-control" value="{{ $response->minute->absence_militants or old('absence_militants') }}" placeholder="Cantidad de militantes faltistas">
											@if($errors->has('absence_militants'))
											<span class="label label-danger">{{ $errors->first('absence_militants') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('black_militants') ? ' has-error' : '' }}">
											<label for="black_militants">Bola negra<span class="text-danger">*</span></label>
											<input type="number" name="black_militants" id="black_militants" class="form-control" value="{{ $response->minute->black_militants or old('black_militants') }}" placeholder="Cantidad de militantes con bola negra">
											@if($errors->has('black_militants'))
											<span class="label label-danger">{{ $errors->first('black_militants') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('white_militants') ? ' has-error' : '' }}">
											<label for="white_militants">Bola blanca<span class="text-danger">*</span></label>
											<input type="number" name="white_militants" id="white_militants" class="form-control" value="{{ $response->minute->white_militants or old('white_militants') }}" placeholder="Cantidad de militantes con bola blanca">
											@if($errors->has('white_militants'))
											<span class="label label-danger">{{ $errors->first('white_militants') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('head_office') ? ' has-error' : '' }}">
											<label for="head_office">Oficina central de reclutamiento<span class="text-danger">*</span></label>
											<input type="text" name="head_office" id="head_office" class="form-control" value="{{ $response->minute->head_office or old('head_office') }}" placeholder="Nombre con letra">
											@if($errors->has('head_office'))
											<span class="label label-danger">{{ $errors->first('head_office') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('local_office') ? ' has-error' : '' }}">
											<label for="local_office">Oficina local de reclutamiento<span class="text-danger">*</span></label>
											<input type="text" name="local_office" id="local_office" class="form-control" value="{{ $response->minute->local_office or old('local_office') }}" placeholder="Nombre con letra">
											@if($errors->has('local_office'))
											<span class="label label-danger">{{ $errors->first('local_office') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('militar_zone') ? ' has-error' : '' }}">
											<label for="militar_zone">Zona militar<span class="text-danger">*</span></label>
											<input type="text" name="militar_zone" id="militar_zone" class="form-control" value="{{ $response->minute->militar_zone or old('militar_zone') }}" placeholder="__/a">
											@if($errors->has('militar_zone'))
											<span class="label label-danger">{{ $errors->first('militar_zone') }}</span>
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
						<a href="{{ route('listMinutesDraw') }}" class="btn btn-default btn-block"><i class="fa fa-arrow-left"></i> Regresar</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection