@extends('layouts.pdf')

@section('content')
	<style>
		body {
			padding: 0px 30px 0px 30px;
			font-size: 9pt;
		}
		#text-header {
			font-weight: bold;
			font-size: 11pt;
		}
	</style>
	<br>
	<p class="text-center" id="text-header">ACTA DE EXTRAVÍO.</p>
	<p class="text-center">{{ mb_strtoupper($response->doc->local_board) }} JUNTA MUNICIPAL DE RECLUTAMIENTO DE {{ mb_strtoupper($response->doc->board_place) }}.</p>
	<p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EN LA PLAZA DE {{ mb_strtoupper($response->doc->place) }}, SIENDO LAS 1000 HORAS DEL {{ mb_strtoupper($response->doc->date) }}, REUNIDOS LOS CC. {{ mb_strtoupper($response->doc->persons_involved) }} QUE ACTÚAN COMO TESTIGOS, SE ENCONTRÓ QUE LA CARTILLA DE IDENTIDAD DEL SERVICIO MILITAR NACIONAL MATRÍCULA {{ mb_strtoupper($response->doc->enrollment) }} , MINISTRADA A ESTA JUNTA POR LA <u>{{ $response->doc->militar_zone }}</u>/a ZONA MILITAR, PARA EXPEDIRSE A LOS SOLDADOS DEL SERVICIO MILITAR NACIONAL CLASE "<u>{{ $response->doc->class }}</u>", ANTICIPADOS Y REMISOS, RESULTÓ EXTRAVIADA POR:</p>
	<strong>
	<p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ mb_strtoupper($response->doc->annotations) }}</p>
	</strong>
	<p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO HABIENDO MÁS ASUNTOS QUE TRATAR, SE DA POR TERMINADA LA PRESENTE ACTA, LEVANTÁNDOSE POR TRIPLICADO, REMITIÉNDOSE EL ORIGINAL A LA DIRECCIÓN GENERAL DE PERSONAL {{ mb_strtoupper($response->doc->head_office) }}, COPIA AL CUARTEL GENERAL DE LA <u>{{ $response->doc->militar_zone_copy }}</u>/a ZONA MILITAR {{ mb_strtoupper($response->doc->local_office) }} Y COPIA AL ARCHIVO DE ESTA JUNTA, FIRMANDO AL CALCE LOS QUE EN ELLA INTERVINIERON.</p>
	<br><br><br>
	<p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRMAS DEL PRESIDENTE DE LA JUNTA MUNICIPAL DE RECLUTAMIENTO Y EL OPERADOR DE LA JUNTA, CANCELÁNDOLA CON EL SELLO DE LA JUNTA MUNICIPAL.</p>
@endsection