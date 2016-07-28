@extends('layouts.pdf')

@section('content')

	<style>
		body {
			font-size: 8pt;
			font-weight: bold;
			margin-top: -22px;
		}
		p {
			height: 8px;
			margin: 0px;
			padding: 0px;
		}
		#p-class {
			margin-top: 12px;
			margin-left: 360px;
		}
		#p-name {
			margin-top: 7px;
			margin-left: 248px;
		}
		#p-birthday {
			margin-top: 7px;
			margin-left: 334px;	
		}
		#p-born {
			margin-top: 7px;
			margin-left: 253px;		
		}
		#p-father {
			margin-top: 15px;
			margin-left: 248px;
		}
		#p-mother {
			margin-top: 7px;
			margin-left: 233px;
		}
		#p-civil {
			margin-top: 7px;
			margin-left: 285px;	
		}
		#p-occupation {
			margin-top: 15px;
			margin-left: 263px;	
		}
		#p-literate {
			display: inline-block;
			margin-bottom: 0px;
			padding: 0px;
			height: 2px;
			float: left;
			margin-top: 0px;
			margin-left: 358px;
			width: 7px;
		}
		#p-curp {
			display: inline-block;
			margin-bottom: 0px;
			padding: 0px;
			height: 2px;
			float: left;
			margin-left: 45px;
		}
		#p-school {
			margin-top: 0px;
			margin-left: 377px;
		}
		#p-address {
			margin-top: 15px;
			margin-left: 258px;
		}
		#p-president {
			margin-top: 131px;
			margin-left: 175px;
		}
		#p-date {
			margin-top: 13px;
			margin-left: 190px;
		}
	</style>

	<p id="p-class">{{ $militant->class }}</p>
	<p id="p-name">{{ strtoupper($militant->first_name.' '.$militant->last_name_a.' '.$militant->last_name_b) }}</p>
	<p id="p-birthday">{{ strtoupper($militant->birthday) }}</p>
	<p id="p-born">{{ strtoupper($militant->born()->first()->city).', '.strtoupper($militant->born()->first()->state) }}</p>
	<p id="p-father">{{ strtoupper($militant->father()->first()->first_name).' '.strtoupper($militant->father()->first()->last_name_a).' '.strtoupper($militant->father()->first()->last_name_b) }}</p>
	<p id="p-mother">{{ strtoupper($militant->mother()->first()->first_name).' '.strtoupper($militant->mother()->first()->last_name_a).' '.strtoupper($militant->mother()->first()->last_name_b) }}</p>
	<p id="p-civil">{{ strtoupper($militant->civil_state) }}</p>
	<p id="p-occupation">{{ strtoupper($militant->occupation) }}</p>
	<p id="p-literate">{{ strtoupper($militant->literate) }}</p>
	<p id="p-curp">{{ strtoupper($militant->curp) }}</p>
	<p id="p-school">{{ strtoupper($militant->school_degree) }}</p>
	<p id="p-address">{{ strtoupper($militant->address()->first()->street).' '.strtoupper($militant->address()->first()->number_exterior) }}</p>
	<p id="p-president">SALVADOR VALLEJO VILLALOBOS</p>
	<p id="p-date">CHUCANDIRO, MICH., A 18 DE ENERO DEL 2016</p>

@endsection