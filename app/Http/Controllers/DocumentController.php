<?php

namespace App\Http\Controllers;

use PDF;

use Illuminate\Http\Request;
use App\Http\Requests;

// Models
use App\Models\Militant;
use App\Models\Family;
use App\Models\Address;

class DocumentController extends Controller {
    
	public $data;

	public function __construct() {
		$this->data = array();
	}

    public function printMilitaryId($id) {
    	// Check if militant exists
    	$militant = Militant::find($id);
    	if(!$militant) {
    		abort(404, '¡No existe el militante!');
    	}

    	$this->data['militant'] = $militant;
    	$pdf = PDF::loadView('documents.militaryId', $this->data);
		return $pdf->stream();
    }

}

// End of file