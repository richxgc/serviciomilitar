<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<!-- Collapse -->
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!-- Branding -->
			<a href="{{ route('home') }}" class="navbar-brand">
				Formatos
			</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-main">
			<!-- Left side of navbar -->
			<ul class="nav navbar-nav">
				@if(Auth::user())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Militantes <span class="caret"></span></a>
						<!-- militants menu -->
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"> Ver lista</a></li>
							<li><a href="#"> Capturar nuevo</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Formatos <span class="caret"></span></a>
						<!-- formats menu -->
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"> Cartilla militar</a></li>
						</ul>
					</li>
				@endif
			</ul>
			<!-- Right side of navbar -->
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::user())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Auth::user()->name  }} <span class="caret"></span>
						</a>
						<!-- Right dropdown -->
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"> Cambiar contraseña</a></li>
							<li><a href="{{ route('auth::logout') }}"> Cerrar sesión</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
	</div>
</nav>