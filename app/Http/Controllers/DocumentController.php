<?php

namespace App\Http\Controllers;

use PDF;

use Illuminate\Http\Request;
use App\Http\Requests;

// Models
use App\Models\Passbook;
use App\Models\MinuteDraw;
use App\Models\Militant;
use App\Models\Family;
use App\Models\Address;

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
		$this->response->militants = Militant::where('class', $this->response->passbook->class)->get();
		if(!$this->response->militants) {
			abort(404, '!No hay militantes para realizar el balance de cartillas');
		}
		// Print pdf
		$pdf = PDF::loadView('documents.passbook', ['response' => $this->response]);
		return $pdf->stream();
	}

}

// End of file