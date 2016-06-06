<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

// Models
use App\Models\Militant;

class MilitantController extends Controller {

	public $response;

	public function __construct() {
		$this->response = new \stdClass();
		$this->response->success = true;
	}

	public function index() {
		$this->response->militants = Militant::paginate(30);
		return view('militants.list', ['response' => $this->response]);
	}

	public function create() {
		return view('militants.create');
	}

	public function store(Request $request) {

	}
	
}

// End of file