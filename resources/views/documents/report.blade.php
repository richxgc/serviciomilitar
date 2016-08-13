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
		#table {
			font-size: 8pt;
			border-right: 1px solid #000;
		}
		.no-padding table {
			margin: 0px;
			padding: 0px;
			border: none;
		}
		.no-padding td {
			border-left: none;
			border-right: none;
		}
		.no-padding td.no-top {
			border-top: none;
		}
	</style>
	<br>
	<p class="text-center" id="text-header">INFORME MENSUAL POR GRADO DE ESTUDIOS.</p>
	<p class="text-center">{{ mb_strtoupper($response->report->local_board) }} JUNTA MUNICIPAL DE RECLUTAMIENTO DE {{ mb_strtoupper($response->report->board_place) }}.</p>
	<br>
	<table cellspacing="0" id="table">
		<thead>
			<tr>
				<th class="text-center">MES.</th>
				<th class="text-center">CLASE.</th>
				<th class="text-center">ANALFABETAS.</th>
				<th class="text-center">PRIMARIA.</th>
				<th class="text-center">SECUNDARIA.</th>
				<th class="text-center">BACHILLERATO.</th>
				<th class="text-center">LICENCIATURA.</th>
				<th class="text-center">SUBTOTAL.</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0; ?>
			<?php $size = sizeof($response->months); ?>
			@foreach($response->months as $month)
			<tr>
				@if($i == 0)
				<td class="text-center">{{ mb_strtoupper($month['month']) }}<br>(DESDE EL {{ mb_strtoupper(substr($month['start'], 8, 2)).' '.mb_strtoupper(substr($month['month'], 0 ,3)).'. '.mb_strtoupper(substr($month['start'], 0, 4)) }}).</td>
				@elseif(sizeof($response->months) == ($i +1))
				<td class="text-center">{{ mb_strtoupper($month['month']) }}<br>(HASTA EL {{ mb_strtoupper(substr($month['end'], 8, 2)).' '.mb_strtoupper(substr($month['month'], 0 ,3)).'. '.mb_strtoupper(substr($month['end'], 0, 4)) }}).</td>
				@else
				<td class="text-center">{{ mb_strtoupper($month['month']) }}</td>
				@endif
				<td class="no-padding">
					<table cellspacing="0">
						<tr>
							<td class="no-top">ANTICIPADOS.</td>
						</tr>
						<tr>
							<td>CLASE.</td>
						</tr>
						<tr>
							<td>REMISOS.</td>
						</tr>
						<tr>
							<td>TOTAL</td>
						</tr>
					</table>
				</td>
				<td class="no-padding">
					<table cellspacing="0">
						<tr>
							<td class="text-center no-top">{{ $month['classes']['anticipados']['analfabeta'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['normales']['analfabeta'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['remisos']['analfabeta'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['totals']['analfabeta'] }}</td>
						</tr>
					</table>
				</td>
				<td class="no-padding">
					<table cellspacing="0">
						<tr>
							<td class="text-center no-top">{{ $month['classes']['anticipados']['primaria'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['normales']['primaria'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['remisos']['primaria'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['totals']['primaria'] }}</td>
						</tr>
					</table>
				</td>
				<td class="no-padding">
					<table cellspacing="0">
						<tr>
							<td class="text-center no-top">{{ $month['classes']['anticipados']['secundaria'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['normales']['secundaria'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['remisos']['secundaria'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['totals']['secundaria'] }}</td>
						</tr>
					</table>
				</td>
				<td class="no-padding">
					<table cellspacing="0">
						<tr>
							<td class="text-center no-top">{{ $month['classes']['anticipados']['bachillerato'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['normales']['bachillerato'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['remisos']['bachillerato'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['totals']['bachillerato'] }}</td>
						</tr>
					</table>
				</td>
				<td class="no-padding">
					<table cellspacing="0">
						<tr>
							<td class="text-center no-top">{{ $month['classes']['anticipados']['licenciatura'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['normales']['licenciatura'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['remisos']['licenciatura'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['totals']['licenciatura'] }}</td>
						</tr>
					</table>
				</td>
				<td class="no-padding">
					<table cellspacing="0">
						<tr>
							<td class="text-center no-top">{{ $month['classes']['anticipados']['subtotal'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['normales']['subtotal'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['remisos']['subtotal'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $month['classes']['totals']['total'] }}</td>
						</tr>
					</table>
				</td>
			</tr>
			<?php $i++; ?>
			@endforeach
		</tbody>
	</table>
	<br><br>
	<?php $anual_date =  mb_strtoupper(substr($response->months[0]['start'], 8, 2).' '.substr($response->months[0]['month'], 0, 3).' AL '.substr($response->months[(sizeof($response->months) - 1)]['end'], 8, 2).' '.substr($response->months[(sizeof($response->months) - 1)]['month'], 0, 3).'. '.substr($response->months[(sizeof($response->months) - 1)]['end'], 0, 4)); ?>
	
	<p class="text-center" id="text-header">INFORME ANUAL.({{ $anual_date }}).</p>
	<br>
	<table cellspacing="0" id="table">
		<thead>
			<tr>
				<th class="text-center">MES.</th>
				<th class="text-center">CLASE.</th>
				<th class="text-center">ANALFABETAS.</th>
				<th class="text-center">PRIMARIA.</th>
				<th class="text-center">SECUNDARIA.</th>
				<th class="text-center">BACHILLERATO.</th>
				<th class="text-center">LICENCIATURA.</th>
				<th class="text-center">SUBTOTAL.</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="text-center">{{ $anual_date }}</td>
				<td class="no-padding">
					<table cellspacing="0">
						<tr>
							<td class="no-top">ANTICIPADOS.</td>
						</tr>
						<tr>
							<td>CLASE.</td>
						</tr>
						<tr>
							<td>REMISOS.</td>
						</tr>
						<tr>
							<td>TOTAL</td>
						</tr>
					</table>
				</td>
				<td class="no-padding">
					<table cellspacing="0">
						<tr>
							<td class="text-center no-top">{{ $response->anual['anticipados']['analfabeta'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['normales']['analfabeta'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['remisos']['analfabeta'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['totals']['analfabeta'] }}</td>
						</tr>
					</table>
				</td>
				<td class="no-padding">
					<table cellspacing="0">
						<tr>
							<td class="text-center no-top">{{ $response->anual['anticipados']['primaria'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['normales']['primaria'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['remisos']['primaria'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['totals']['primaria'] }}</td>
						</tr>
					</table>
				</td>
				<td class="no-padding">
					<table cellspacing="0">
						<tr>
							<td class="text-center no-top">{{ $response->anual['anticipados']['secundaria'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['normales']['secundaria'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['remisos']['secundaria'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['totals']['secundaria'] }}</td>
						</tr>
					</table>
				</td>
				<td class="no-padding">
					<table cellspacing="0">
						<tr>
							<td class="text-center no-top">{{ $response->anual['anticipados']['bachillerato'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['normales']['bachillerato'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['remisos']['bachillerato'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['totals']['bachillerato'] }}</td>
						</tr>
					</table>
				</td>
				<td class="no-padding">
					<table cellspacing="0">
						<tr>
							<td class="text-center no-top">{{ $response->anual['anticipados']['licenciatura'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['normales']['licenciatura'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['remisos']['licenciatura'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['totals']['licenciatura'] }}</td>
						</tr>
					</table>
				</td>
				<td class="no-padding">
					<table cellspacing="0">
						<tr>
							<td class="text-center no-top">{{ $response->anual['anticipados']['subtotal'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['normales']['subtotal'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['remisos']['subtotal'] }}</td>
						</tr>
						<tr>
							<td class="text-center">{{ $response->anual['totals']['total'] }}</td>
						</tr>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	<br><br>
	<p class="text-center">{{ mb_strtoupper($response->report->date_place) }}</p>
	<p class="text-center">EL PRESIDENTE DE LA J.M.R</p>
	<p class="text-center"><br>__________________________<br>{{ mb_strtoupper($response->report->president) }}</p>
@endsection