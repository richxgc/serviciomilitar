@extends('layouts.app')

@include('common.navbar')

@section('content')
<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form action="{{ URL::current() }}" method="post">
				{{ csrf_field() }}
				<div class="panel panel-default">
					<div class="panel-heading">Cambiar Contraseña</div>
					<div class="panel-body">
						<p>Los datos marcados con <span class="text-danger">*</span> son requeridos. Si tu contraseña es cambiada de forma exitosa serás redirigido al inicio.</p>
						<div class="form-group {{ $errors->has('old_password') ? ' has-error' : '' }}">
							<label for="old_password">Contraseña anterior<span class="text-danger">*</span></label>
							<input type="password" name="old_password" id="old_password" class="form-control">
							@if($errors->has('old_password'))
							<span class="label label-danger">{{ $errors->first('old_password') }}</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password">Contraseña<span class="text-danger">*</span></label>
							<input type="password" name="password" id="password" class="form-control">
							@if($errors->has('password'))
							<span class="label label-danger">{{ $errors->first('password') }}</span>
							@endif
						</div>
						<div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<label for="password_confirmation">Confirma la contraseña<span class="text-danger">*</span></label>
							<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
							@if($errors->has('password_confirmation'))
							<span class="label label-danger">{{ $errors->first('password_confirmation') }}</span>
							@endif
						</div>
					</div>
					<div class="panel-footer text-right">
						<a href="{{ route('home') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection