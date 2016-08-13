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

		// Get dates of report
		$start 	= intval(substr($this->response->report->start, 5, 2));
		$end 	= intval(substr($this->response->report->end, 5, 2));
		$year   = intval(substr($this->response->report->start, 0, 10));
		$day_start = substr($this->response->report->start, 8, 2);
		$day_end = substr($this->response->report->end, 8, 2);
		$months = array();
		// Set result
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
				$last_day = null;
				switch ($i) {
					case 1:
						$last_day = 31;
						break;
					case 2:
						$last_day = 29;
						break;
					case 3:
						$last_day = 31;
						break;
					case 4:
						$last_day = 30;
						break;
					case 5:
						$last_day = 31;
						break;
					case 6:
						$last_day = 30;
						break;
					case 7:
						$last_day = 31;
						break;
					case 8:
						$last_day = 31;
						break;
					case 9:
						$last_day = 30;
						break;
					case 10:
						$last_day = 31;
						break;
					case 11:
						$last_day = 30;
						break;
					case 12:
						$last_day = 31;
						break;
					default:
						$last_day = 31;
						break;
				}
				if($i <= 9) {
					$query_end = $year.'-0'.$i.'-'.$last_day;
				} else {
					$query_end = $year.'-'.$i.'-'.$last_day;
				}
				
			}

			$classes = array('normales' => array(), 'anticipados' => array(), 'remisos' => array());
			foreach ($classes as $key => &$value) {
				$militants = null;
				$degrees = array('analfabeta' => 0, 'primaria' => 0, 'secundaria' => 0, 'bachillerato' => 0, 'licenciatura' => 0, 'subtotal' => 0);
				if($key == 'normales') {
					$militants = Militant::select(DB::raw('count(*) as count, school_degree'))->where('type', 'Normal')->where('presented_class', $this->response->report->class)->whereBetween('created_at',[$query_start, $query_end])->groupBy('school_degree')->get();
				} elseif($key == 'anticipados') {
					$militants = Militant::select(DB::raw('count(*) as count, school_degree'))->where('type', 'Anticipado')->where('presented_class', $this->response->report->class)->whereBetween('created_at',[$query_start, $query_end])->groupBy('school_degree')->get();
				} elseif($key == 'remisos') {
					$militants = Militant::select(DB::raw('count(*) as count, school_degree'))->where('type', 'Remiso')->where('presented_class', $this->response->report->class)->whereBetween('created_at',[$query_start, $query_end])->groupBy('school_degree')->get();
				}
				foreach($militants as $militant) {
					if($militant->school_degree == 'Analfabeta') {
						$degrees['analfabeta'] = $militant->count;
					} elseif($militant->school_degree == 'Primaria') {
						$degrees['primaria'] = $militant->count;
					} elseif($militant->school_degree == 'Secundaria') {
						$degrees['secundaria'] = $militant->count;
					} elseif($militant->school_degree == 'Bachillerato') {
						$degrees['bachillerato'] = $militant->count;
					} elseif($militant->school_degree == 'Licenciatura') {
						$degrees['licenciatura'] = $militant->count;
					}
					$degrees['subtotal'] += $militant->count;
				}
				$value = $degrees;
				
			}

			// Get totals
			$total_a = $classes['normales']['analfabeta'] + $classes['anticipados']['analfabeta'] + $classes['remisos']['analfabeta'];
			$total_b = $classes['normales']['primaria'] + $classes['anticipados']['primaria'] + $classes['remisos']['primaria'];
			$total_c = $classes['normales']['secundaria'] + $classes['anticipados']['secundaria'] + $classes['remisos']['secundaria'];
			$total_d = $classes['normales']['bachillerato'] + $classes['anticipados']['bachillerato'] + $classes['remisos']['bachillerato'];
			$total_e = $classes['normales']['licenciatura'] + $classes['anticipados']['licenciatura'] + $classes['remisos']['licenciatura'];
			$total = $classes['normales']['subtotal'] + $classes['anticipados']['subtotal'] + $classes['remisos']['subtotal'];
			$classes['totals'] = array('analfabeta' => $total_a, 'primaria' => $total_b, 'secundaria' => $total_c, 'bachillerato' => $total_d, 'licenciatura' => $total_e, 'total' => $total);

			switch ($i) {
				case 1:
					array_push($months, array('month' => 'Enero', 'start' => $query_start, 'end' => $query_end, 'classes' => $classes));
					break;
				case 2:
					array_push($months, array('month' => 'Febrero', 'start' => $query_start, 'end' => $query_end, 'classes' => $classes));
					break;
				case 3:
					array_push($months, array('month' => 'Marzo', 'start' => $query_start, 'end' => $query_end, 'classes' => $classes));
					break;
				case 4:
					array_push($months, array('month' => 'Abril', 'start' => $query_start, 'end' => $query_end, 'classes' => $classes));
					break;
				case 5:
					array_push($months, array('month' => 'Mayo', 'start' => $query_start, 'end' => $query_end, 'classes' => $classes));
					break;
				case 6:
					array_push($months, array('month' => 'Junio', 'start' => $query_start, 'end' => $query_end, 'classes' => $classes));
					break;
				case 7:
					array_push($months, array('month' => 'Julio', 'start' => $query_start, 'end' => $query_end, 'classes' => $classes));
					break;
				case 8:
					array_push($months, array('month' => 'Agosto', 'start' => $query_start, 'end' => $query_end, 'classes' => $classes));
					break;
				case 9:
					array_push($months, array('month' => 'Septiembre', 'start' => $query_start, 'end' => $query_end, 'classes' => $classes));
					break;
				case 10:
					array_push($months, array('month' => 'Octubre', 'start' => $query_start, 'end' => $query_end, 'classes' => $classes));
					break;
				case 11:
					array_push($months, array('month' => 'Noviembre', 'start' => $query_start, 'end' => $query_end, 'classes' => $classes));
					break;
				case 12:
					array_push($months, array('month' => 'Diciembre', 'start' => $query_start, 'end' => $query_end, 'classes' => $classes));
					break;
				default:
					break;
			}
		}

		// Get totals
		$anual = array('normales' => array(), 'anticipados' => array(), 'remisos' => array());
		foreach($anual as $key => &$value) {
			$militants = null;
			$degrees = array('analfabeta' => 0, 'primaria' => 0, 'secundaria' => 0, 'bachillerato' => 0, 'licenciatura' => 0, 'subtotal' => 0);
			if($key == 'normales') {
				$militants = Militant::select(DB::raw('count(*) as count, school_degree'))->where('type', 'Normal')->where('presented_class', $this->response->report->class)->whereBetween('created_at',[$this->response->report->start, $this->response->report->end])->groupBy('school_degree')->get();
			} elseif($key == 'anticipados') {
				$militants = Militant::select(DB::raw('count(*) as count, school_degree'))->where('type', 'Anticipado')->where('presented_class', $this->response->report->class)->whereBetween('created_at',[$this->response->report->start, $this->response->report->end])->groupBy('school_degree')->get();
			} elseif($key == 'remisos') {
				$militants = Militant::select(DB::raw('count(*) as count, school_degree'))->where('type', 'Remiso')->where('presented_class', $this->response->report->class)->whereBetween('created_at',[$this->response->report->start, $this->response->report->end])->groupBy('school_degree')->get();
			}
			foreach($militants as $militant) {
				if($militant->school_degree == 'Analfabeta') {
					$degrees['analfabeta'] = $militant->count;
				} elseif($militant->school_degree == 'Primaria') {
					$degrees['primaria'] = $militant->count;
				} elseif($militant->school_degree == 'Secundaria') {
					$degrees['secundaria'] = $militant->count;
				} elseif($militant->school_degree == 'Bachillerato') {
					$degrees['bachillerato'] = $militant->count;
				} elseif($militant->school_degree == 'Licenciatura') {
					$degrees['licenciatura'] = $militant->count;
				}
				$degrees['subtotal'] += $militant->count;
			}
			$value = $degrees;
		}
		$total_a = $anual['normales']['analfabeta'] + $anual['anticipados']['analfabeta'] + $anual['remisos']['analfabeta'];
		$total_b = $anual['normales']['primaria'] + $anual['anticipados']['primaria'] + $anual['remisos']['primaria'];
		$total_c = $anual['normales']['secundaria'] + $anual['anticipados']['secundaria'] + $anual['remisos']['secundaria'];
		$total_d = $anual['normales']['bachillerato'] + $anual['anticipados']['bachillerato'] + $anual['remisos']['bachillerato'];
		$total_e = $anual['normales']['licenciatura'] + $anual['anticipados']['licenciatura'] + $anual['remisos']['licenciatura'];
		$total = $anual['normales']['subtotal'] + $anual['anticipados']['subtotal'] + $anual['remisos']['subtotal'];
		$anual['totals'] = array('analfabeta' => $total_a, 'primaria' => $total_b, 'secundaria' => $total_c, 'bachillerato' => $total_d, 'licenciatura' => $total_e, 'total' => $total);
		
		// Set reponse of months and anual
		$this->response->months = $months;
		$this->response->anual = $anual;

		// Print pdf
		//return view('documents.report', ['response' => $this->response]);
		$pdf = PDF::loadView('documents.report', ['response' => $this->response])->setPaper('a4', 'landscape');
		return $pdf->stream();
	}

}

// End of file