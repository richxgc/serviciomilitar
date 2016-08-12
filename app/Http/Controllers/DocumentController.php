<?php

namespace App\Http\Controllers;

use DB;
use PDF;

use Illuminate\Http\Request;
use App\Http\Requests;

// Models
use App\Models\Militant;
use App\Models\Family;
use App\Models\Address;
use App\Models\MinuteDraw;
use App\Models\Passbook;
use App\Models\InitialList;
use App\Models\DisabledLost;
use App\Models\RegisterBook;
use App\Models\Report;

class DocumentController extends Controller {
	
	public $response;

	public function __construct() {
		$this->response = new \stdClass();
		$this->response->success = true;
	}

	public function printMilitaryId($id) {
		// Check if militant exists
		$militant = Militant::find($id);
		if(!$militant) {
			abort(404, '¡No existe el militante!');
		}
		// Print pdf
		$pdf = PDF::loadView('documents.militaryId', ['militant' => $militant]);
		return $pdf->stream();
	}

	public function printMinuteDraw($id) {
		// Check if minute exists
		$this->response->minute = MinuteDraw::find($id);
		if(!$this->response->minute) {
			abort(404, '¡No existe el acta de sorteo!');
		}
		// Print pdf
		$pdf = PDF::loadView('documents.minuteDraw', ['response' => $this->response]);
		return $pdf->stream();
	}

	public function printPassbook($id) {
		// Check if passbook exists
		$this->response->passbook = Passbook::find($id);
		if(!$this->response->passbook) {
			abort(404, '¡No existe el balance de cartillas!');
		}
		// Get militants for the class of passbook
		$this->response->militants = Militant::where('presented_class', $this->response->passbook->class)->get();
		if(sizeof($this->response->militants) <= 0) {
			abort(404, '!No hay militantes para realizar el balance de cartillas!');
		}
		// Print pdf
		$pdf = PDF::loadView('documents.passbook', ['response' => $this->response]);
		return $pdf->stream();
	}

	public function printInitialList($id) {
		$this->response->list = InitialList::find($id);
		if(!$this->response->list) {
			abort(404, '¡No existe la lista de sorteo!');
		}
		// Get militants for the class of list
		$this->response->militants = Militant::where('presented_class', $this->response->list->class)->get();
		if(sizeof($this->response->militants) <= 0) {
			abort(404, '!No hay militantes para realizar la lista inicial de sorteo!');
		}

		// Get count of classes
		$this->response->resume = Militant::select(DB::raw('count(*) as count, class'))->where('presented_class', $this->response->list->class)->groupBy('class')->get();

		// Check if list has blue ball
		$this->response->blue = false;
		$blue_militants = Militant::where('presented_class', $this->response->list->class)->where('ball', '3');
		if($blue_militants->count() > 0) {
			$this->response->blue = true;	
		}
		// Print pdf
		$pdf = PDF::loadView('documents.initialList', ['response' => $this->response])->setPaper('a4', 'landscape');
		return $pdf->stream();
	}

	public function printOneList($id) {
		$this->response->list = InitialList::find($id);
		if(!$this->response->list) {
			abort(404, '¡No existe la lista de sorteo!');
		}
		// Get militants for the class of list
		$this->response->militants = Militant::where('presented_class', $this->response->list->class)->where('ball', '1')->get();
		if(sizeof($this->response->militants) <= 0) {
			abort(404, '!No hay militantes para realizar la lista inicial de sorteo!');
		}
		// Print pdf
		$pdf = PDF::loadView('documents.oneList', ['response' => $this->response]);
		return $pdf->stream();
	}

	public function printTwoList($id) {
		$this->response->list = InitialList::find($id);
		if(!$this->response->list) {
			abort(404, '¡No existe la lista de sorteo!');
		}
		// Get militants for the class of list
		$this->response->militants = Militant::where('presented_class', $this->response->list->class)->where('ball', '2')->get();
		if(sizeof($this->response->militants) <= 0) {
			abort(404, '!No hay militantes para realizar la lista inicial de sorteo!');
		}
		// Print pdf
		$pdf = PDF::loadView('documents.twoList', ['response' => $this->response]);
		return $pdf->stream();
	}

	public function printThreeList($id) {
		$this->response->list = InitialList::find($id);
		if(!$this->response->list) {
			abort(404, '¡No existe la lista de sorteo!');
		}
		// Get militants for the class of list
		$this->response->militants = Militant::where('presented_class', $this->response->list->class)->where('ball', '3')->get();
		if(sizeof($this->response->militants) <= 0) {
			abort(404, '!No hay militantes para realizar la lista inicial de sorteo!');
		}
		// Print pdf
		$pdf = PDF::loadView('documents.threeList', ['response' => $this->response]);
		return $pdf->stream();
	}

	public function printDisabled($id) {
		$this->response->doc = DisabledLost::find($id);
		if(!$this->response->doc) {
			abort(404, '¡No existe el acta de inutilización!');
		}
		$pdf = PDF::loadView('documents.disabled', ['response' => $this->response]);
		return $pdf->stream();
	}

	public function printLost($id) {
		$this->response->doc = DisabledLost::find($id);
		if(!$this->response->doc) {
			abort(404, '¡No existe el acta de extravío!');
		}
		$pdf = PDF::loadView('documents.lost', ['response' => $this->response]);
		return $pdf->stream();
	}

	public function printRegisterBook($id) {
		$this->response->book = RegisterBook::find($id);
		if(!$this->response->book) {
			abort(404, '¡No existe el libro de registro!');
		}
		// Get militants for the class of book
		$this->response->militants = Militant::where('presented_class', $this->response->book->class)->where('ball', '1')->orWhere('ball', '3')->get();
		if(sizeof($this->response->militants) <= 0) {
			abort(404, '!No hay militantes para realizar la lista inicial de sorteo!');
		}

		// Print pdf
		$pdf = PDF::loadView('documents.registerBook', ['response' => $this->response])->setPaper('a4', 'landscape');
		return $pdf->stream();
	}


	public function printReport($id) {
		$this->response->report = Report::find($id);
		if(!$this->response->report) {
			abort(404, '¡No existe el reporte!');
		}

		/*$this->response->militants = Militant::where('presented_class', $this->response->report->class)->whereBetween('created_at',[$this->response->report->start, $this->response->report->end])->get();*/
		//dd($this->response->report->start);

		$start 	= intval(substr($this->response->report->start, 5, 2));
		$end 	= intval(substr($this->response->report->end, 5, 2));
		$year   = intval(substr($this->response->report->start, 0, 10));
		$day_start = substr($this->response->report->start, 8, 2);
		$day_end = substr($this->response->report->end, 8, 2);
		$months = array();
		for($i = $start; $i <= $end; $i++) {
			$query_start 	= null;
			$query_end 		= null;
			// Get start of query for each month
			if($i == $start) {
				if($i <= 9) {
					$query_start = $year.'-0'.$i.'-'.$day_start;
				} else {
					$query_start = $year.'-'.$i.'-'.$day_start;
				}
				
			} else {
				if($i <= 9) {
					$query_start = $year.'-0'.$i.'-01';
				} else {
					$query_start = $year.'-'.$i.'-01';
				}
				
			}
			// Get end of query for each month
			if($i == $end) {
				if($i <= 9) {
					$query_end = $year.'-0'.$i.'-'.$day_end;
				} else {
					$query_end = $year.'-'.$i.'-'.$day_end;
				}
				
			} else {
				if($i <= 9) {
					$query_end = $year.'-0'.$i.'-31';
				} else {
					$query_end = $year.'-'.$i.'-31';
				}
				
			}
			switch ($i) {
				case 1:
					array_push($months, array('month' => 'Enero', 'start' => $query_start, 'end' => $query_end));
					break;
				case 2:
					array_push($months, array('month' => 'Febrero', 'start' => $query_start, 'end' => $query_end));
					break;
				case 3:
					array_push($months, array('month' => 'Marzo', 'start' => $query_start, 'end' => $query_end));
					break;
				case 4:
					array_push($months, array('month' => 'Abril', 'start' => $query_start, 'end' => $query_end));
					break;
				case 5:
					array_push($months, array('month' => 'Mayo', 'start' => $query_start, 'end' => $query_end));
					break;
				case 6:
					array_push($months, array('month' => 'Junio', 'start' => $query_start, 'end' => $query_end));
					break;
				case 7:
					array_push($months, array('month' => 'Julio', 'start' => $query_start, 'end' => $query_end));
					break;
				case 8:
					array_push($months, array('month' => 'Agosto', 'start' => $query_start, 'end' => $query_end));
					break;
				case 9:
					array_push($months, array('month' => 'Septiembre', 'start' => $query_start, 'end' => $query_end));
					break;
				case 10:
					array_push($months, array('month' => 'Octubre', 'start' => $query_start, 'end' => $query_end));
					break;
				case 11:
					array_push($months, array('month' => 'Noviembre', 'start' => $query_start, 'end' => $query_end));
					break;
				case 12:
					array_push($months, array('month' => 'Diciembre', 'start' => $query_start, 'end' => $query_end));
					break;
				default:
					break;
			}
		}

		dd($months);

	}

}

// End of file