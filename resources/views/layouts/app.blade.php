<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<title>Formatos</title>
	<link rel="stylesheet" href="{{ url(elixir('css/app.css')) }}">
</head>
<body>
	@yield('content')
	<script src="{{ url(elixir('js/all.js')) }}"></script>
	@if(!empty($errors->first('invalid')))
	<script>new PNotify({ title: 'Error', text: '{{ $errors->first('invalid') }}', type: 'error', icon: false})</script>
	@endif
</body>
</html>