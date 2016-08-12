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
	<p class="text-center" id="text-header">LISTA INICIAL DEL SORTEO.</p>
	<p class="text-center">{{ mb_strtoupper($response->list->local_board) }} JUNTA MUNICIPAL DE RECLUTAMIENTO DE {{ mb_strtoupper($response->list->board_place) }}.</p>
	<p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LISTA QUE SE ELABORA COMO RESULTADO DEL REGISTRO DEL PERSONAL DEL S.M.N CLASE "<u>{{ $response->list->class }}</u>", ANTICIPADOS Y REMISOS, QUE PARTICIPARÁN EN EL SORTEO DEL PRESENTE AÑO.</p>
	<table cellspacing="0" id="table">
		<thead>
			<tr>
				<th class="text-center small">No<br>PROG.</th>
				<th class="text-center small">MATRÍCULA.</th>
				<th class="text-center">NOMBRE (S).</th>
				@if($response->blue == true)
				<th colspan="3" class="no-padding small">
				@else
				<th colspan="2" class="no-padding small">
				@endif
					<table cellspacing="0">
						<thead>
							<tr>
								@if($response->blue == true)
								<th class="text-center small border-bottom" colspan="3">RESULTADO.</th>
								@else
								<th class="text-center small border-bottom" colspan="2">RESULTADO.</th>
								@endif
							</tr>
							<tr>
								<th class="text-center small" colspan="1">B.B</th>
								@if($response->blue == true)
								<th class="text-center small" colspan="1">B.A</th>
								@endif
								<th class="text-center small" colspan="1">B.N</th>
							</tr>
						</thead>	
					</table>
				</th>
				<th class="text-center small">CLASE.</th>
				<th class="text-center small">GRADO MÁXIMO DE ESTUDIOS.</th>
				<th class="text-center">DOMICILIO.</th>
			</tr>
		</thead>
		<tbody>
			<?php $index = 1; ?>
			@foreach($response->militants as $militant)
			<tr>
				<td class="text-center">@if($index < 10) {{ '0'.$index }} @else {{ $index }} @endif</td>
				<td class="text-center">{{ mb_strtoupper($militant->enrollment) }}</td>
				<td>{{ mb_strtoupper($militant->first_name.' '.$militant->last_name_a.' '.$militant->last_name_b) }}</td>
				<td class="text-center">@if($militant->ball == 1) X @endif</td>
				@if($response->blue == true)
				<td class="text-center">@if($militant->ball == 3) X @endif</td>
				@endif
				<td class="text-center">@if($militant->ball == 2) X @endif</td>
				<td class="text-center">{{ mb_strtoupper($militant->class) }}</td>
				<td>{{ mb_strtoupper($militant->school_degree) }}</td>
				<td>
					@if($militant->address()->first()->neighborhood)
					{{ mb_strtoupper($militant->address()->first()->street.' '.$militant->address()->first()->number_exterior.', '.$militant->address()->first()->neighborhood) }}
					@else
					{{ mb_strtoupper($militant->address()->first()->street.' '.$militant->address()->first()->number_exterior) }}
					@endif
				</td>
			</tr>
			<?php $index++; ?>
			@endforeach
		</tbody>
	</table>
	<br>
	<strong>
	<p class="text-center">RESÚMEN.</p>
	@foreach($response->resume as $resume)
	<p class="text-center" style="margin: 0px">CLASE {{ $resume->class }}.............{{ $resume->count }}</p>
	@endforeach
	<p class="text-center">TOTAL: .....................{{ sizeof($response->militants) }}</p>
	</strong>
	<br>
	<p class="text-center">{{ mb_strtoupper($response->list->date_place) }}</p>
	<p class="text-center">EL PRESIDENTE DE LA J.M.R</p>
	<p class="text-center"><br>__________________________<br>{{ mb_strtoupper($response->list->president) }}</p>
@endsection