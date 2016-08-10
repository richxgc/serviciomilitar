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
		.normal-sign {
			display: inline-block;
			float: left;
			margin-top: 12px;
			width: 180px;
		}
		.second-sign {
			display: inline-block;
			float: left;
			margin-top: 12px;
			width: 270px;
		}
		.third-sign {
			display: block;
			margin-left: auto;
			margin-right: auto;
			margin-top: 12px;
			width: 270px;
		}
		#inspector, #secretario {
			padding-top: 12px;
			margin-left: 50px;
		}
		#vecino2, #vecino3 {
			margin-left: 50px;
		}
		#repre2 {
			margin-left: 102px;
		}
	</style>
	<br>
	<p class="text-center" id="text-header">
		ACTA DE SORTEO DEL PERSONAL DEL SERVICIO MILITAR CLASE "<u>&nbsp; {{mb_strtoupper($response->minute->class) }} &nbsp;</u>", ANTICIPADOS Y PERMISOS.

	</p>
	<p class="text-justify">EN LA PLAZA DE {{ mb_strtoupper($response->minute->place_draw) }}, SIENDO LAS DIEZ HORAS DEL {{ mb_strtoupper($response->minute->date_draw) }}, REUNIDOS LOS CC. {{ mb_strtoupper($response->minute->persons_involved) }} Y LOS JÓVENES PERTENECIENTES A LA CLASE <u>{{ mb_strtoupper($response->minute->class) }}</u>, ANTICIPADOS Y REMISOS, DANDO CUMPLIMIENTO A LO DISPUESTO EN EL ARTÍCULO 75/o DEL REGLAMENTO DE LA LEY DEL SERVICIO MILITAR, EL PRESIDENTE DE LA JUNTA MUNICIPAL DE RECLUTAMIENTO DE {{ mb_strtoupper($response->minute->local_board) }}, HIZO SABER A LOS CC. SOLDADOS DEL SERVICIO MILITAR NACIONAL EL DERECHO QUE LA MENCIONADA LEY LES OTORGA PARA ELEGIR POR VOTACIÓN A TRES ELEMENTOS ENTRE ELLOS, PARA QUE LOS REPRESENTEN EN EL SORTEO; EFECTUADO LO ANTERIOR, RESULTARON ELECTOS LOS SOLDADOS DEL SERVICIO MILITAR NACIONAL {{ mb_strtoupper($response->minute->soldiers_involved) }}; CON FUNDAMENTO EN LO DISPUESTO EN EL ARTÍCULO 78 DEL REGLAMENTO DE LA MISMA LEY, SE DESIGNÓ AL NIÑO (A) {{ mb_strtoupper($response->minute->kid) }} DE 10 AÑOS DE EDAD PARA SACAR LAS BOLAS DEL ÁNFORA DURANTE EL ACTO, PROCEDIENDO A PASAR LISTA {{ $response->minute->total_militants }} ELEMENTOS DEL SERVICIO NACIONAL MILITAR REGISTRADOS Y QUE PARTICIPARÁN EN EL SORTEO, CON EL RESULTADO DE {{ $response->minute->absence_militants }} FALTISTAS, INMEDIATAMENTE SE INTRODUJERON EN UN ÁNFORA UN NÚMERO IGUAL DE BOLAS AL TOTAL DE JÓVENES REGISTRADOS, ENTRE BOLAS BLANCAS Y BOLAS NEGRAS, CON EL SIGUIENTE RESULTADO {{ $response->minute->black_militants }} AGRACIADOS CON BOLA NEGRA Y {{ $response->minute->white_militants }} AGRACIADOS CON BOLA BLANCA, CUYOS NOMBRES SE CONSIGNAN EN LAS LISTAS RESPECTIVAS, NO HABIENDO MÁS DILIGENCIAS QUE PRACTICAR POR PARTE DE LOS SUSCRITOS, SE DIÓ POR TERMINADA EL ACTA A LAS 1400 HORAS DEL DÍA DE LA FECHA, LEVANTÁNDOSE LA PRESENTE ACTA POR QUINTUPLICADO PARA REMITIRSE LA ORIGINAL A LA DIRECCIÓN GENERAL DE PERSONAL {{ mb_strtoupper($response->minute->head_office) }}, CUARTEL GENERAL DE LA <u>{{ $response->minute->militar_zone }}</u>/a ZONA MILITAR {{ mb_strtoupper($response->minute->local_office) }} Y ARCHIVO DE LA JUNTA MUNICIPAL DE RECLUTAMIENTO, FIRMANDO AL CALCE LOS QUE EN ELLA INTERVINIERON.</p>
	<br><br>
	<p class="text-center normal-sign" id="presidente">PRESIDENTE DE LA JUNTA<br><br><br><br>___________________________</p>
	<p class="text-center normal-sign" id="inspector">INSPECTOR MILITAR (GRADO, NOMBRE Y MATRÍCULA)<br><br><br>___________________________<br>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
	<p class="text-center normal-sign" id="secretario">SECRETARIO DE LA JUNTA<br><br><br><br>___________________________</p>
	<br><br><br>
	<p class="text-center"><u>VECINOS CARACTERIZADOS</u></p>
	<p class="text-center normal-sign" id="vecino1"><br>___________________________<br>(NOMBRE Y FIRMA)</p>
	<p class="text-center normal-sign" id="vecino2"><br>___________________________<br>(NOMBRE Y FIRMA)</p>
	<p class="text-center normal-sign" id="vecino3"><br>___________________________<br>(NOMBRE Y FIRMA)</p>
	<br><br><br>
	<p class="text-center"><u>REPRESENTANTES DEL S.M.N ELECTOS POR VOTACIÓN</u></p>
	<p class="text-center second-sign" id="repre1"><br>_________________________________________<br>(NOMBRE, MATRÍCULA Y FIRMA)</p>
	<p class="text-center second-sign" id="repre2"><br>_________________________________________<br>(NOMBRE, MATRÍCULA Y FIRMA)</p>
	<p class="text-center third-sign" id="repre3"><br>_________________________________________<br>(NOMBRE, MATRÍCULA Y FIRMA)</p>
@endsection