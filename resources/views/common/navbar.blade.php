<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="{{ route('home') }}" class="navbar-brand">
				Servicio Militar Nacional
			</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-main">
			<ul class="nav navbar-nav">
				@if(Auth::user())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Militantes <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ route('militants') }}"> Ver lista</a></li>
							<li><a href="{{ route('createMilitant') }}"> Capturar nuevo</a></li>
						</ul>
					</li>
					<!--<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Formatos <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"> Cartilla militar</a></li>
						</ul>
					</li>-->
				@endif
			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::user())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Auth::user()->name  }} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ route('changePassword') }}"> Cambiar contraseña</a></li>
							<li><a href="{{ route('auth::logout') }}"> Cerrar sesión</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
	</div>
</nav>