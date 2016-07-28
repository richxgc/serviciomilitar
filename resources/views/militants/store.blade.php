@extends('layouts.app')

@include('common.navbar')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h4><i class="fa fa-edit"></i> Capturar nuevo militante</h4>
			<p>Los datos marcados con <span class="text-danger">*</span> son requeridos para generar un nuevo registro de militante. La captura de datos es en formato abierto para que se adecue a sus necesidades.</p>
		</div>
		<form action="{{ route('storeMilitant') }}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="militant_id" value="{{ $response->militant->id or '' }}">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">Militante</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('curp') ? ' has-error' : '' }}">
											<label for="curp">CURP<span class="text-danger">*</span></label>
											<input type="text" name="curp" id="curp" class="form-control" value="{{ $response->militant->curp or old('curp') }}">
											@if($errors->has('curp'))
											<span class="label label-danger">{{ $errors->first('curp') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('class') ? ' has-error' : '' }}">
											<label for="class">Clase</label>
											<input type="text" name="class" id="class" class="form-control" value="{{ $response->militant->class or old('class') }}">
											@if($errors->has('class'))
											<span class="label label-danger">{{ $errors->first('class') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('enrollment') ? ' has-error' : '' }}">
											<label for="enrollment">Matrícula</label>
											<input type="text" name="enrollment" id="enrollment" class="form-control" value="{{ $response->militant->enrollment or old('enrollment') }}">
											@if($errors->has('enrollment'))
											<span class="label label-danger">{{ $errors->first('enrollment') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
											<label for="first_name">Nombre(s)<span class="text-danger">*</span></label>
											<input type="text" name="first_name" id="first_name" class="form-control" value="{{ $response->militant->first_name or old('first_name') }}">
											@if($errors->has('first_name'))
											<span class="label label-danger">{{ $errors->first('first_name') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('last_name_a') ? ' has-error' : '' }}">
											<label for="last_name_a">Apellido paterno<span class="text-danger">*</span></label>
											<input type="text" name="last_name_a" id="last_name_a" class="form-control" value="{{ $response->militant->last_name_a or old('last_name_a') }}">
											@if($errors->has('last_name_a'))
											<span class="label label-danger">{{ $errors->first('last_name_a') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('last_name_b') ? ' has-error' : '' }}">
											<label for="last_name_b">Apellido materno<span class="text-danger">*</span></label>
											<input type="text" name="last_name_b" id="last_name_b" class="form-control" value="{{ $response->militant->last_name_b or old('last_name_b') }}">
											@if($errors->has('last_name_b'))
											<span class="label label-danger">{{ $errors->first('last_name_b') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('birthday') ? ' has-error' : '' }}">
											<label for="birthday">Fecha de nacimiento<span class="text-danger">*</span></label>
											<input type="text" name="birthday" id="birthday" class="form-control" value="{{ $response->militant->birthday or old('birthday') }}">
											@if($errors->has('birthday'))
											<span class="label label-danger">{{ $errors->first('birthday') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('city_born') ? ' has-error' : '' }}">
											<label for="city_born">Ciudad/Localidad de nacimiento<span class="text-danger">*</span></label>
											<input type="text" name="city_born" id="city_born" class="form-control" value="{{ $response->militant->city_born or old('city_born') }}">
											@if($errors->has('city_born'))
											<span class="label label-danger">{{ $errors->first('city_born') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('state_born') ? ' has-error' : '' }}">
											<label for="state_born">Estado de nacimiento<span class="text-danger">*</span></label>
											<input type="text" name="state_born" id="state_born" class="form-control" value="{{ $response->militant->state_born or old('state_born') }}">
											@if($errors->has('state_born'))
											<span class="label label-danger">{{ $errors->first('state_born') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('country_born') ? ' has-error' : '' }}">
											<label for="country_born">País de nacimiento<span class="text-danger">*</span></label>
											<input type="text" name="country_born" id="country_born" class="form-control" value="{{ $response->militant->country_born or old('country_born') }}">
											@if($errors->has('country_born'))
											<span class="label label-danger">{{ $errors->first('country_born') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('civil_state') ? ' has-error' : '' }}">
											<label for="civil_state">Estado civil<span class="text-danger">*</span></label>
											<input type="text" name="civil_state" id="civil_state" class="form-control" value="{{ $response->militant->civil_state or old('civil_state') }}">
											@if($errors->has('civil_state'))
											<span class="label label-danger">{{ $errors->first('civil_state') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('occupation') ? ' has-error' : '' }}">
											<label for="occupation">Ocupación<span class="text-danger">*</span></label>
											<input type="text" name="occupation" id="occupation" class="form-control" value="{{ $response->militant->occupation or old('occupation') }}">
											@if($errors->has('occupation'))
											<span class="label label-danger">{{ $errors->first('occupation') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('literate') ? ' has-error' : '' }}">
											<label for="literate">Sabe leer y escribir<span class="text-danger">*</span></label>
											<input type="text" name="literate" id="literate" class="form-control" value="{{ $response->militant->literate or old('literate') }}">
											@if($errors->has('literate'))
											<span class="label label-danger">{{ $errors->first('literate') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('school_degree') ? ' has-error' : '' }}">
											<label for="school_degree">Grado de estudios<span class="text-danger">*</span></label>
											<input type="text" name="school_degree" id="school_degree" class="form-control" value="{{ $response->militant->school_degree or old('school_degree') }}">
											@if($errors->has('school_degree'))
											<span class="label label-danger">{{ $errors->first('school_degree') }}</span>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">Dirección</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('street') ? ' has-error' : '' }}">
											<label for="street">Calle<span class="text-danger">*</span></label>
											<input type="text" name="street" id="street" class="form-control" value="{{ $response->militant->street or old('street') }}">
											@if($errors->has('street'))
											<span class="label label-danger">{{ $errors->first('street') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('number_exterior') ? ' has-error' : '' }}">
											<label for="number_exterior">Número exterior<span class="text-danger">*</span></label>
											<input type="text" name="number_exterior" id="number_exterior" class="form-control" value="{{ $response->militant->number_exterior or old('number_exterior') }}">
											@if($errors->has('number_exterior'))
											<span class="label label-danger">{{ $errors->first('number_exterior') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('number_interior') ? ' has-error' : '' }}">
											<label for="number_interior">Número interior</label>
											<input type="text" name="number_interior" id="number_interior" class="form-control" value="{{ $response->militant->number_interior or old('number_interior') }}">
											@if($errors->has('number_interior'))
											<span class="label label-danger">{{ $errors->first('number_interior') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('neighborhood') ? ' has-error' : '' }}">
											<label for="neighborhood">Colonia</label>
											<input type="text" name="neighborhood" id="neighborhood" class="form-control" value="{{ $response->militant->neighborhood or old('neighborhood') }}">
											@if($errors->has('neighborhood'))
											<span class="label label-danger">{{ $errors->first('neighborhood') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('postal_code') ? ' has-error' : '' }}">
											<label for="postal_code">Código postal<span class="text-danger">*</span></label>
											<input type="text" name="postal_code" id="postal_code" class="form-control" value="{{ $response->militant->postal_code or old('postal_code') }}">
											@if($errors->has('postal_code'))
											<span class="label label-danger">{{ $errors->first('postal_code') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
											<label for="city">Ciudad/Localidad<span class="text-danger">*</span></label>
											<input type="text" name="city" id="city" class="form-control" value="{{ $response->militant->city or old('city') }}">
											@if($errors->has('city'))
											<span class="label label-danger">{{ $errors->first('city') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
											<label for="state">Estado<span class="text-danger">*</span></label>
											<input type="text" name="state" id="state" class="form-control" value="{{ $response->militant->state or old('state') }}">
											@if($errors->has('state'))
											<span class="label label-danger">{{ $errors->first('state') }}</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
											<label for="country">País<span class="text-danger">*</span></label>
											<input type="text" name="country" id="country" class="form-control" value="{{ $response->militant->country or old('country') }}">
											@if($errors->has('country'))
											<span class="label label-danger">{{ $errors->first('country') }}</span>
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
					<div class="panel-heading">Padres</div>
					<div class="panel-body">
						<div class="form-group {{ $errors->has('father_first_name') ? ' has-error' : '' }}">
							<label for="father_first_name">Padre: nombre(s)</label>
							<input type="text" name="father_first_name" id="father_first_name" class="form-control" value="{{ $response->militant->father_first_name or old('father_first_name') }}">
							@if($errors->has('father_first_name'))
							<span class="label label-danger">{{ $errors->first('father_first_name') }}</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('father_last_name_a') ? ' has-error' : '' }}">
							<label for="father_last_name_a">Padre: apellido paterno</label>
							<input type="text" name="father_last_name_a" id="father_last_name_a" class="form-control" value="{{ $response->militant->father_last_name_a or old('father_last_name_a') }}">
							@if($errors->has('father_last_name_a'))
							<span class="label label-danger">{{ $errors->first('father_last_name_a') }}</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('father_last_name_b') ? ' has-error' : '' }}">
							<label for="father_last_name_b">Padre: apellido materno</label>
							<input type="text" name="father_last_name_b" id="father_last_name_b" class="form-control" value="{{ $response->militant->father_last_name_b or old('father_last_name_b') }}">
							@if($errors->has('father_last_name_b'))
							<span class="label label-danger">{{ $errors->first('father_last_name_b') }}</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('mother_first_name') ? ' has-error' : '' }}">
							<label for="mother_first_name">Madre: nombre(s)</label>
							<input type="text" name="mother_first_name" id="mother_first_name" class="form-control" value="{{ $response->militant->mother_first_name or old('mother_first_name') }}">
							@if($errors->has('mother_first_name'))
							<span class="label label-danger">{{ $errors->first('mother_first_name') }}</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('mother_last_name_a') ? ' has-error' : '' }}">
							<label for="mother_last_name_a">Madre: apellido paterno</label>
							<input type="text" name="mother_last_name_a" id="mother_last_name_a" class="form-control" value="{{ $response->militant->mother_last_name_a or old('mother_last_name_a') }}">
							@if($errors->has('mother_last_name_a'))
							<span class="label label-danger">{{ $errors->first('mother_last_name_a') }}</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('mother_last_name_b') ? ' has-error' : '' }}">
							<label for="mother_last_name_b">Madre: apellido materno</label>
							<input type="text" name="mother_last_name_b" id="mother_last_name_b" class="form-control" value="{{ $response->militant->mother_last_name_b or old('mother_last_name_b') }}">
							@if($errors->has('mother_last_name_b'))
							<span class="label label-danger">{{ $errors->first('mother_last_name_b') }}</span>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Expedición</div>
					<div class="panel-body">
						<div class="form-group {{ $errors->has('issue_place') ? ' has-error' : '' }}">
							<label for="issue_place">Lugar donde se expide<span class="text-danger">*</span></label>
							<input type="text" name="issue_place" id="issue_place" class="form-control" value="{{ $response->militant->issue_place or old('issue_place') }}">
							@if($errors->has('issue_place'))
							<span class="label label-danger">{{ $errors->first('issue_place') }}</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('issue_date') ? ' has-error' : '' }}">
							<label for="issue_date">Fecha de expedición<span class="text-danger">*</span></label>
							<input type="text" name="issue_date" id="issue_date" class="form-control" value="{{ $response->militant->issue_date or old('issue_date') }}">
							@if($errors->has('issue_date'))
							<span class="label label-danger">{{ $errors->first('issue_date') }}</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('issue_president') ? ' has-error' : '' }}">
							<label for="issue_president">Presidente de la S.M. de R.<span class="text-danger">*</span></label>
							<input type="text" name="issue_president" id="issue_president" class="form-control" value="{{ $response->militant->issue_president or old('issue_president') }}">
							@if($errors->has('issue_president'))
							<span class="label label-danger">{{ $errors->first('issue_president') }}</span>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Acciones</div>
					<div class="panel-body">
						<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Guardar datos</button>
						<a href="{{ route('militants') }}" class="btn btn-default btn-block"><i class="fa fa-arrow-left"></i> Regresar</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection