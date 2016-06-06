@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<br><br><br>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Configuración inicial</strong></div>
				<div class="panel-body">
					<h4 class="text-center">Bienvenido, a continuación se solicitarán algunos datos básicos para proceder con la instalación de su sistema.</h4>
					<br>
					<form action="{{ route('makeInstall') }}" method="post" class="form-horizontal">
						{{ csrf_field() }}
						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Nombre completo<span class="text-danger">*</span></label>
							<div class="col-md-6">
								<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Escribe el nombre completo del administrador" >
								@if($errors->has('name'))
								<span class="label label-danger">{{ $errors->first('name') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">Correo electrónico<span class="text-danger">*</span></label>
							<div class="col-md-6">
								<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Escribe el email del administrador" >
								@if($errors->has('email'))
								<span class="label label-danger">{{ $errors->first('email') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">Contraseña<span class="text-danger">*</span></label>
							<div class="col-md-6">
								<input type="password" name="password" id="password" class="form-control" placeholder="Escribe la contraseña del administrador" >
								@if($errors->has('password'))
								<span class="label label-danger">{{ $errors->first('password') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<label for="password_confirmation" class="col-md-4 control-label">Confirma la contraseña<span class="text-danger">*</span></label>
							<div class="col-md-6">
								<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Escribe de nuevo la contraseña para confirmar" >
								@if($errors->has('password_confirmation'))
								<span class="label label-danger">{{ $errors->first('password_confirmation') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-cog"></i> Instalar sistema</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection