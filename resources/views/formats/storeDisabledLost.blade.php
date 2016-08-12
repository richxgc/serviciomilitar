@extends('layouts.app')

@include('common.navbar')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h4><i class="fa fa-edit"></i> Capturar acta de inutilización o extravío</h4>
			<p>Los datos marcados con <span class="text-danger">*</span> son requeridos. La captura de datos es en formato abierto para que se adecue a sus necesidades.</p>
		</div>
		<form action="{{ route('storeDisabledLost') }}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="doc_id" value="{{ $response->doc->id or '' }}">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">Datos de la acta</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
											<label for="type">Tipo de acta<span class="text-danger">*</span></label>
											<select name="type" id="type" class="form-control">
												<option value="">-- Selecciona el tipo de acta --</option>
												<option value="1" @if($response->doc->type == '1' || old('type') == '1') selected @endif>Inutilización</option>
												<option value="2" @if($response->doc->type == '2' || old('type') == '2') selected @endif>Extravío</option>
											</select>
											@if($errors->has('type'))
											<span class="label label-danger">{{ $errors->first('type') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('local_board') ? ' has-error' : '' }}">
											<label for="local_board">Junta municipal<span class="text-danger">*</span></label>
											<input type="text" name="local_board" id="local_board" class="form-control" value="{{ $response->doc->local_board or old('local_board') }}" placeholder="Junta municipal de reclutamiento">
											@if($errors->has('local_board'))
											<span class="label label-danger">{{ $errors->first('local_board') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('board_place') ? ' has-error' : '' }}">
											<label for="board_place">Lugar de la junta<span class="text-danger">*</span></label>
											<input type="text" name="board_place" id="board_place" class="form-control" value="{{ $response->doc->board_place or old('board_place') }}" placeholder="Municipio de la junta de reclutamiento">
											@if($errors->has('board_place'))
											<span class="label label-danger">{{ $errors->first('board_place') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('place') ? ' has-error' : '' }}">
											<label for="place">Lugar<span class="text-danger">*</span></label>
											<input type="text" name="place" id="place" class="form-control" value="{{ $response->doc->place or old('place') }}" placeholder="Lugar con letra (plaza)">
											@if($errors->has('place'))
											<span class="label label-danger">{{ $errors->first('place') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
											<label for="date">Fecha<span class="text-danger">*</span></label>
											<input type="text" name="date" id="date" class="form-control" value="{{ $response->doc->date or old('date') }}" placeholder="Dia, mes y año con letra">
											@if($errors->has('date'))
											<span class="label label-danger">{{ $errors->first('date') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('persons_involved') ? ' has-error' : '' }}">
											<label for="persons_involved">Personas involucradas<span class="text-danger">*</span></label>
											<textarea name="persons_involved" id="persons_involved" class="form-control" rows="3" placeholder="Nombre y apellidos del presidente de la junta y testigos (regidor, secretario, operador, etc)">{{ $response->doc->persons_involved or old('persons_involved') }}</textarea>
											@if($errors->has('persons_involved'))
											<span class="label label-danger">{{ $errors->first('persons_involved') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('enrollment') ? ' has-error' : '' }}">
											<label for="enrollment">Matrícula<span class="text-danger">*</span></label>
											<input type="text" name="enrollment" id="enrollment" class="form-control" value="{{ $response->doc->enrollment or old('enrollment') }}" placeholder="Anotar el número">
											@if($errors->has('enrollment'))
											<span class="label label-danger">{{ $errors->first('enrollment') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('militar_zone') ? ' has-error' : '' }}">
											<label for="militar_zone">Zona militar que ministra<span class="text-danger">*</span></label>
											<input type="text" name="militar_zone" id="militar_zone" class="form-control" value="{{ $response->doc->militar_zone or old('militar_zone') }}" placeholder="__/a">
											@if($errors->has('militar_zone'))
											<span class="label label-danger">{{ $errors->first('militar_zone') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('class') ? ' has-error' : '' }}">
											<label for="class">Clase<span class="text-danger">*</span></label>
											<input type="text" name="class" id="class" class="form-control" value="{{ $response->doc->class or old('class') }}" placeholder="Anotar clase">
											@if($errors->has('class'))
											<span class="label label-danger">{{ $errors->first('class') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('annotations') ? ' has-error' : '' }}">
											<label for="annotations">Motivo<span class="text-danger">*</span></label>
											<textarea name="annotations" id="annotations" class="form-control" rows="3" placeholder="Anotar el motivo de la inutilización o extravío de la cartilla">{{ $response->doc->annotations or old('annotations') }}</textarea>
											@if($errors->has('annotations'))
											<span class="label label-danger">{{ $errors->first('annotations') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('head_office') ? ' has-error' : '' }}">
											<label for="head_office">Oficina central de reclutamiento<span class="text-danger">*</span></label>
											<input type="text" name="head_office" id="head_office" class="form-control" value="{{ $response->doc->head_office or old('head_office') }}" placeholder="Nombre con letra">
											@if($errors->has('head_office'))
											<span class="label label-danger">{{ $errors->first('head_office') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('local_office') ? ' has-error' : '' }}">
											<label for="local_office">Oficina de reclutamiento de zona<span class="text-danger">*</span></label>
											<input type="text" name="local_office" id="local_office" class="form-control" value="{{ $response->doc->local_office or old('local_office') }}" placeholder="Nombre con letra">
											@if($errors->has('local_office'))
											<span class="label label-danger">{{ $errors->first('local_office') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('militar_zone_copy') ? ' has-error' : '' }}">
											<label for="militar_zone_copy">Zona militar copia<span class="text-danger">*</span></label>
											<input type="text" name="militar_zone_copy" id="militar_zone_copy" class="form-control" value="{{ $response->doc->militar_zone_copy or old('militar_zone_copy') }}" placeholder="__/a">
											@if($errors->has('militar_zone_copy'))
											<span class="label label-danger">{{ $errors->first('militar_zone_copy') }}</span>
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
						<a href="{{ route('listDisabledLost') }}" class="btn btn-default btn-block"><i class="fa fa-arrow-left"></i> Regresar</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection