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
		#cartillas {
			margin-left: 440px;
			font-weight: bold;
		}
		.ultra-small {
			font-size: 6pt;
		}
		#table {
			margin-top: -10px;
		}
	</style>
	<br>
	<p class="text-center" id="text-header">BALANCE DE LAS CARTILLAS EXPEDIDAS.</p>
	<p class="text-center">{{ mb_strtoupper($response->passbook->local_board) }} JUNTA MUNICIPAL DE RECLUTAMIENTO DE {{ mb_strtoupper($response->passbook->board_place) }}.</p>
	<p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BALANCE DE CARTILLAS DE IDENTIDAD MILITAR QUE FUERON MINISTRADAS A ESTA JUNTA MUNICIPAL DE RECLUTAMIENTO, POR LA OFICINA DE RECLUTAMIENTO DE LA <u>{{ $response->passbook->militar_zone }}</u>/a ZONA MILITAR, PARA SER EXPEDIDAS AL PERSONAL DE SOLDADOS DEL SERVICIO MILITAR NACIONAL CLASE "<u>{{ $response->passbook->class }}</u>", ANTICIPADOS Y REMISOS.</p>
	<p class="text-center">________________________________________________________________________________________________
	<br><span id="cartillas">CARTILLAS.</span>
	</p>
	<table cellspacing="0" id="table">
		<thead>
			<tr>
				<th class="text-center small">No<br>PROG.</th>
				<th class="text-center small">MATRÍCULA.</th>
				<th class="text-center">NOMBRE (S).</th>
				<th class="text-center small"><span class="ultra-small">EXPEDIDAS.</span></th>
				<th class="text-center small"><span class="ultra-small">INUTILIZADAS.</span></th>
				<th class="text-center small"><span class="ultra-small">EXTRAVIADAS.</span></th>
			</tr>
		</thead>
		<tbody>
			<?php $index = 1; ?>
			@foreach($response->militants as $militant)
			<tr>
				<td class="text-center">@if($index < 10) {{ '0'.$index }} @else {{ $index }} @endif</td>
				<td class="text-center">{{ mb_strtoupper($militant->enrollment) }}</td>
				<td>{{ mb_strtoupper($militant->first_name.' '.$militant->last_name_a.' '.$militant->last_name_b) }}</td>
				<td class="text-center">@if($militant->passbook_issued > 0) {{ $militant->passbook_issued }} @endif</td>
				<td class="text-center">@if($militant->passbook_disabled > 0) {{ $militant->passbook_disabled }} @endif</td>
				<td class="text-center">@if($militant->passbook_lost > 0) {{ $militant->passbook_lost }} @endif</td>
			</tr>
			<?php $index++; ?>
			@endforeach
		</tbody>
	</table>
	<br><br>
	<p>CARTILLAS MINISTRADAS: DE LA <u>{{ mb_strtoupper($response->passbook->start_ministered) }}</u> A LA <u>{{ mb_strtoupper($response->passbook->end_ministered) }}</u>.</p>
	<p>EXPEDIDAS AL PERSONAL DE LA CLASE, ANTICIPADOS Y REMISOS: DE LA <u>{{ mb_strtoupper($response->passbook->start_issued) }}</u> A LA <u>{{ mb_strtoupper($response->passbook->end_issued) }}</u>.</p>
	<p>INUTILIZADAS: <u>{{ mb_strtoupper($response->passbook->disabled) }}</u>.</p>
	<p>EXTRAVIADAS: <u>{{ mb_strtoupper($response->passbook->lost) }}</u></p>
	<p>SOBRANTES: DE LA <u>{{ mb_strtoupper($response->passbook->start_leftover) }}</u> A LA <u>{{ mb_strtoupper($response->passbook->end_leftover) }}</u>.</p>
	<p>SUMAS IGUALES: <u>{{ mb_strtoupper($response->passbook->equal_plus) }}</u></p>
	<p class="text-center">________________________________________________________________________________________________</p>
	<br>
	<p class="text-center">{{ mb_strtoupper($response->passbook->date_place) }}</p>
	<p class="text-center">EL PRESIDENTE DE LA J.M.R</p>
	<p class="text-center"><br>__________________________<br>{{ mb_strtoupper($response->passbook->president) }}</p>
@endsection