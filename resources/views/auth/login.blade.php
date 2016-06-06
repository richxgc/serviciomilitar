@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<br><br><br>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Iniciar sesión</div>
				<div class="panel-body">
					<h4 class="text-center">Bienvenido, introduce tus datos para acceder al sistema.</h4>
					<br>
					<form class="form-horizontal" role="form" method="post" action="{{ route('auth::login') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">Correo electrónico</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Introduce tu correo electrónico">
								@if($errors->has('email'))
								<span class="label label-danger">{{ $errors->first('email') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">Contraseña</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control" name="password" placeholder="Introduce tu contraseña">
								@if($errors->has('password'))
								<span class="label label-danger">{{ $errors->first('password') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Recuérdame
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary pull-right">
									<i class="fa fa-btn fa-sign-in"></i> Acceder
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
