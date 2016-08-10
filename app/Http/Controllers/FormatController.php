<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request;
use App\Http\Requests;

// Models
use App\Models\Militant;
use App\Models\MinuteDraw;
use App\Models\Passbook;

class FormatController extends Controller {
	
	public $response;

	public function __construct() {
		$this->response = new \stdClass();
		$this->response->success = true;
	}

	public function listMinutesDraw() {
		$this->response->minutes = MinuteDraw::orderBy('id', 'desc')->paginate(50);
		return view('formats.listMinutesDraw', ['response' => $this->response]);
	}

	public function createMinuteDraw() {
		$this->response->minute = new MinuteDraw();
		return view('formats.storeMinuteDraw', ['response' => $this->response]);
	}

	public function editMinuteDraw($id) {
		$this->response->minute = MinuteDraw::find($id);
		return view('formats.storeMinuteDraw', ['response' => $this->response]);
	}

	public function storeMinuteDraw(Request $request) {
		$post_data = $request->all();

		$rules =  [
			'class' 			=> 'required',
			'place_draw' 		=> 'required',
			'date_draw' 		=> 'required',
			'persons_involved' 	=> 'required',
			'local_board' 		=> 'required',
			'soldiers_involved' => 'required',
			'kid' 				=> 'required',
			'total_militants' 	=> 'required',
			'absence_militants' => 'required',
			'black_militants' 	=> 'required',
			'white_militants' 	=> 'required',
			'head_office' 		=> 'required',
			'local_office' 		=> 'required',
			'militar_zone' 		=> 'required',
		];

		$messages =  [
			'class.required' 				=> 'Este campo es requerido',
			'place_draw.required' 			=> 'Este campo es requerido',
			'date_draw.required' 			=> 'Este campo es requerido',
			'persons_involved.required' 	=> 'Este campo es requerido',
			'local_board.required' 			=> 'Este campo es requerido',
			'soldiers_involved.required' 	=> 'Este campo es requerido',
			'kid.required' 					=> 'Este campo es requerido',
			'total_militants.required' 		=> 'Este campo es requerido',
			'absence_militants.required' 	=> 'Este campo es requerido',
			'black_militants.required' 		=> 'Este campo es requerido',
			'white_militants.required' 		=> 'Este campo es requerido',
			'head_office.required' 			=> 'Este campo es requerido',
			'local_office.required' 		=> 'Este campo es requerido',
			'militar_zone.required' 		=> 'Este campo es requerido',
		];

		$validator = Validator::make($post_data, $rules, $messages);

		if($validator->fails()) {
			return back()->withErrors($validator)->withInput($post_data);
		}

		// Define minute var
		$minute = null;

		// Check if data is for new minute or an edition of existent
		$minute_id = intval($request->input('minute_id'));
		if($minute_id != 0 && $minute_id != null) {
			$minute = MinuteDraw::find($minute_id);
		} else {
			$minute = new MinuteDraw();
		}

		$minute->class = trim($request->input('class'));
		$minute->place_draw = trim($request->input('place_draw'));
		$minute->date_draw = trim($request->input('date_draw'));
		$minute->persons_involved = trim($request->input('persons_involved'));
		$minute->local_board = trim($request->input('local_board'));
		$minute->soldiers_involved = trim($request->input('soldiers_involved'));
		$minute->kid = trim($request->input('kid'));
		$minute->total_militants = trim($request->input('total_militants'));
		$minute->absence_militants = trim($request->input('absence_militants'));
		$minute->black_militants = trim($request->input('black_militants'));
		$minute->white_militants = trim($request->input('white_militants'));
		$minute->head_office = trim($request->input('head_office'));
		$minute->local_office = trim($request->input('local_office'));
		$minute->militar_zone = trim($request->input('militar_zone'));
		$minute->save();

		return redirect()->route('listMinutesDraw');
	}

	public function deleteMinuteDraw($id) {
		MinuteDraw::destroy($id);
		return redirect()->route('listMinutesDraw');
	}

	public function listPassbooks() {
		$this->response->passbooks = Passbook::orderBy('id', 'desc')->paginate(50);
		return view('formats.listPassbooks', ['response' => $this->response]);
	}

	public function createPassbook() {
		$this->response->passbook = new Passbook();
		return view('formats.storePassbook', ['response' => $this->response]);
	}

	public function editPassbook($id) {
		$this->response->passbook = Passbook::find($id);
		return view('formats.storePassbook', ['response' => $this->response]);
	}

	public function storePassbook(Request $request) {
		$post_data = $request->all();

		$rules = [
			'class' 			=> 'required',
			'local_board' 		=> 'required',
			'board_place' 		=> 'required',
			'militar_zone' 		=> 'required',
			'president' 		=> 'required',
			'date_place' 		=> 'required',
			'start_ministered' 	=> 'required',
			'end_ministered' 	=> 'required',
			'start_issued' 		=> 'required',
			'end_issued' 		=> 'required',
			'disabled' 			=> 'required',
			'lost' 				=> 'required',
			'start_leftover' 	=> 'required',
			'end_leftover' 		=> 'required',
			'equal_plus' 		=> 'required',
		];

		$messages = [
			'class.required' 			=> 'Este campo es requerido',
			'local_board.required' 		=> 'Este campo es requerido',
			'board_place.required' 		=> 'Este campo es requerido',
			'militar_zone.required' 	=> 'Este campo es requerido',
			'president.required' 		=> 'Este campo es requerido',
			'date_place.required' 		=> 'Este campo es requerido',
			'start_ministered.required' => 'Este campo es requerido',
			'end_ministered.required' 	=> 'Este campo es requerido',
			'start_issued.required' 	=> 'Este campo es requerido',
			'end_issued.required' 		=> 'Este campo es requerido',
			'disabled.required' 		=> 'Este campo es requerido',
			'lost.required' 			=> 'Este campo es requerido',
			'start_leftover.required' 	=> 'Este campo es requerido',
			'end_leftover.required' 	=> 'Este campo es requerido',
			'equal_plus.required' 		=> 'Este campo es requerido',
		];

		$validator = Validator::make($post_data, $rules, $messages);

		if($validator->fails()) {
			return back()->withErrors($validator)->withInput($post_data);
		}

		// Define passbook var
		$passbook = null;
		
		// Check if data is for new passbook or an edition of existent
		$passbook_id = intval($request->input('passbook_id'));
		if($passbook_id != 0 && $passbook_id != null) {
			$passbook = Passbook::find($passbook_id);
		} else {
			$passbook = new Passbook();
		}

		$passbook->class 			= trim($request->input('class'));
		$passbook->local_board 		= trim($request->input('local_board'));
		$passbook->board_place 		= trim($request->input('board_place'));
		$passbook->militar_zone 	= trim($request->input('militar_zone'));
		$passbook->president 		= trim($request->input('president'));
		$passbook->date_place 		= trim($request->input('date_place'));
		$passbook->start_ministered = trim($request->input('start_ministered'));
		$passbook->end_ministered 	= trim($request->input('end_ministered'));
		$passbook->start_issued 	= trim($request->input('start_issued'));
		$passbook->end_issued 		= trim($request->input('end_issued'));
		$passbook->disabled 		= trim($request->input('disabled'));
		$passbook->lost 			= trim($request->input('lost'));
		$passbook->start_leftover 	= trim($request->input('start_leftover'));
		$passbook->end_leftover 	= trim($request->input('end_leftover'));
		$passbook->equal_plus 		= trim($request->input('equal_plus'));
		$passbook->save();

		return redirect()->route('listPassbooks');

	}

	public function deletePassbook($id) {
		Passbook::destroy($id);
		return redirect()->route('listPassbooks');
	}

}

// End of file