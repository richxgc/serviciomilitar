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
	<p class="text-center" id="text-header">LISTA No "UNO".</p>
	<p class="text-center">{{ mb_strtoupper($response->list->local_board) }} JUNTA MUNICIPAL DE RECLUTAMIENTO DE {{ mb_strtoupper($response->list->board_place) }}.</p>
	<p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LISTA No "UNO" QUE SE ELABORA COMO RESULTADO DEL SORTEO DEL PERSONAL DEL S.M.N CLASE "<u>{{ $response->list->class }}</u>", ANTICIPADOS Y REMISOS, QUE RESULTARON AGRACIADOS CON <b>BOLA BLANCA</b> REALIZADO EN ESTA JUNTA DE RECLUTAMIENTO CONFORME A LOS LINEAMIENTOS ESTABLECIDOS EN LA LEGISLACIÓN VIGENTE.</p>
	<table cellspacing="0" id="table">
		<thead>
			<tr>
				<th class="text-center small">NÚMERO.</th>
				<th class="text-center small">MATRÍCULA.</th>
				<th class="text-center">NOMBRE (S).</th>
				<th class="text-center">GRADO MÁXIMO DE ESTUDIOS.</th>
			</tr>
		</thead>
		<tbody>
			<?php $index = 1; ?>
			@foreach($response->militants as $militant)
			<tr>
				<td class="text-center">@if($index < 10) {{ '0'.$index }} @else {{ $index }} @endif</td>
				<td class="text-center">{{ mb_strtoupper($militant->enrollment) }}</td>
				<td>{{ mb_strtoupper($militant->first_name.' '.$militant->last_name_a.' '.$militant->last_name_b) }}</td>
				<td>{{ mb_strtoupper($militant->school_degree) }}</td>
			</tr>
			<?php $index++; ?>
			@endforeach
			<tr>
				<td class="text-center">TOTAL: {{ $index - 1  }}</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<br>
	<p class="text-center">{{ mb_strtoupper($response->list->date_place) }}</p>
	<p class="text-center">EL PRESIDENTE DE LA J.M.R</p>
	<p class="text-center"><br>__________________________<br>{{ mb_strtoupper($response->list->president) }}</p>
@endsection