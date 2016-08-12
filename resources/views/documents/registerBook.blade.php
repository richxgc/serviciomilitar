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
			font-size: 6pt;
		}
	</style>
	<br>
	<p class="text-center" id="text-header">LIBRO DE REGISTRO.</p>
	<p class="text-center">{{ mb_strtoupper($response->book->local_board) }} JUNTA MUNICIPAL DE RECLUTAMIENTO DE {{ mb_strtoupper($response->book->board_place) }}.</p>
	<strong>
		<p class="text-center">LIBRO DE REGISTRO QUE SE ELABORA CON MOTIVO DEL ALISTAMIENTO DE LOS SOLDADOS DEL SERVICIO MILITAR NACIONAL CLASE "<u>{{ $response->book->class }}</u>", ANTICIPADOS Y REMISOS.</p>
	</strong>
	<br>
	<table cellspacing="0" id="table">
		<thead>
			<tr>
				<th class="text-center">No<br>PROG.</th>
				<th class="text-center">MATRÍCULA.</th>
				<th class="text-center">NOMBRE (S) Y APELLIDOS PATERNO Y MATERNO.</th>
				<th class="text-center">FECHA DE NACIMIENTO</th>
				<th class="text-center">LUGAR DE NACIMIENTO (COMPLETO)</th>
				<th class="text-center">C.U.R.P</th>
				<th colspan="2" class="no-padding">
					<table cellspacing="0">
						<thead>
							<tr>
								<th class="text-center border-bottom small" colspan="2">MEXICANOS POR:</th>
							</tr>
							<tr>
								<th colspan="1" class="small">NAC.</th>
								<th colspan="1" class="small">NAT.</th>
							</tr>
						</thead>
					</table>
				</th>
				<th class="text-center">NOMBRE Y APELLIDOS DEL PADRE.</th>
				<th class="text-center">NOMBRE Y APELLIDOS DE LA MADRE.</th>
				<th class="text-center">ESTADO CIVIL.</th>
				<th class="text-center">OCUPACIÓN.</th>
				<th class="text-center">SABE LEER Y ESCRIBIR.</th>
				<th class="text-center">GRADO MÁXIMO DE ESTUDIOS.</th>
				<th class="text-center">DOMICILIO.</th>
				<th class="text-center">FECHA DE EXPEDICIÓN.</th>
			</tr>
		</thead>
		<tbody>
			<?php $index = 1; ?>
			@foreach($response->militants as $militant)
			<tr>
				<td class="text-center">@if($index < 10) {{ '0'.$index }} @else {{ $index }} @endif</td>
				<td class="text-center">{{ mb_strtoupper($militant->enrollment) }}</td>
				<td>{{ mb_strtoupper($militant->first_name.' '.$militant->last_name_a.' '.$militant->last_name_b) }}</td>
				<td>{{ mb_strtoupper($militant->birthday) }}</td>
				<td>{{ mb_strtoupper($militant->born()->first()->city.', '.$militant->born()->first()->state.'. '.$militant->born()->first()->country) }}</td>
				<td>{{ mb_strtoupper($militant->curp) }}</td>
				<td class="text-center">@if($militant->nationality == 'Nacimiento') X @endif</td>
				<td class="text-center">@if($militant->nationality == 'Naturalizacion') X @endif</td>
				<td>{{ mb_strtoupper($militant->father()->first()->first_name.' '.$militant->father()->first()->last_name_a.' '.$militant->father()->first()->last_name_b) }}</td>
				<td>{{ mb_strtoupper($militant->mother()->first()->first_name.' '.$militant->mother()->first()->last_name_a.' '.$militant->mother()->first()->last_name_b) }}</td>
				<td class="text-center">{{ mb_strtoupper($militant->civil_state) }}</td>
				<td class="text-center">{{ mb_strtoupper($militant->occupation) }}</td>
				<td class="text-center">{{ mb_strtoupper($militant->literate) }}</td>
				<td class="text-center">{{ mb_strtoupper($militant->school_degree) }}</td>
				<td>
					@if($militant->address()->first()->neighborhood)
					{{ mb_strtoupper($militant->address()->first()->street.' '.$militant->address()->first()->number_exterior.', '.$militant->address()->first()->neighborhood) }}
					@else
					{{ mb_strtoupper($militant->address()->first()->street.' '.$militant->address()->first()->number_exterior) }}
					@endif
				</td>
				<td>{{ mb_strtoupper($militant->issue_date) }}</td>
			</tr>
			<?php $index++; ?>
			@endforeach
		</tbody>
	</table>
	<br><br>
	<p class="text-center">{{ mb_strtoupper($response->book->date_place) }}</p>
	<p class="text-center">EL PRESIDENTE DE LA J.M.R</p>
	<p class="text-center"><br>__________________________<br>{{ mb_strtoupper($response->book->president) }}</p>
@endsection