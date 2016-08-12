<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta charset="UTF-8">
		<title>Impresion de Documento</title>
		<style>
		body {
			font: Arial, Helvetica, sans-serif;
			margin: 0px;
			padding: 0px;
		}
		table {
			width: 100%;
			border-bottom: 1px solid #000;
		}
		th {
			margin: 0px;
			padding: 5px;
			border-left: 1px solid #000;
			border-top: 1px solid #000;
		}
		th:last-of-type {
			border-right: 1px solid #000;	
		}
		th.small {
			width: 1px;
		}
		td {
			margin: 0px;
			border-left: 1px solid #000;
			border-top: 1px solid #000;
		}
		td:last-of-type {
			border-right: 1px solid #000;
		}
		th.no-padding {
			padding: 0px;
		}
		th > table {
			border: none;
		}
		th > table > thead > tr > th {
			border-right: none !important;
			border-top: none !important;
		}
		th > table > thead > tr > th:first-of-type {
			border-left: none !important;
		}
		th > table > thead > tr > th.border-bottom {
			border-bottom: 1px solid #000;
		}
		.text-justify {
			text-align: justify;
		}
		.text-center {
			text-align: center;
		}
		.page-break {
			page-break-after: always;
		}
		</style>
	</head>
	<body>
		@yield('content')
	</body>
</html>