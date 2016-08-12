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

}

// End of file