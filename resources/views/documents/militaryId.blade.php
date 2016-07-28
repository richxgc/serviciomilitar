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
	<p id="p-name">{{ mb_strtoupper($militant->first_name.' '.$militant->last_name_a.' '.$militant->last_name_b) }}</p>
	<p id="p-birthday">{{ mb_strtoupper($militant->birthday) }}</p>
	<p id="p-born">{{ mb_strtoupper($militant->born()->first()->city).', '.mb_strtoupper($militant->born()->first()->state) }}</p>
	<p id="p-father">{{ mb_strtoupper($militant->father()->first()->first_name).' '.mb_strtoupper($militant->father()->first()->last_name_a).' '.mb_strtoupper($militant->father()->first()->last_name_b) }}</p>
	<p id="p-mother">{{ mb_strtoupper($militant->mother()->first()->first_name).' '.mb_strtoupper($militant->mother()->first()->last_name_a).' '.mb_strtoupper($militant->mother()->first()->last_name_b) }}</p>
	<p id="p-civil">{{ mb_strtoupper($militant->civil_state) }}</p>
	<p id="p-occupation">{{ mb_strtoupper($militant->occupation) }}</p>
	<p id="p-literate">{{ mb_strtoupper($militant->literate) }}</p>
	<p id="p-curp">{{ mb_strtoupper($militant->curp) }}</p>
	<p id="p-school">{{ mb_strtoupper($militant->school_degree) }}</p>
	<p id="p-address">{{ mb_strtoupper($militant->address()->first()->street).' '.mb_strtoupper($militant->address()->first()->number_exterior) }} @if($militant->address()->first()->neighborhood) {{ ', '.mb_strtoupper($militant->address()->first()->neighborhood) }} @endif</p>
	<p id="p-president">{{ mb_strtoupper($militant->issue_president) }}</p>
	<p id="p-date">{{ mb_strtoupper($militant->issue_place) }}, A {{ mb_strtoupper($militant->issue_date) }}</p>

@endsection