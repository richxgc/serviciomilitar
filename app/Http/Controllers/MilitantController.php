<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request;
use App\Http\Requests;

// Models
use App\Models\Militant;
use App\Models\Family;
use App\Models\Address;

class MilitantController extends Controller {

	public $response;

	public function __construct() {
		$this->response = new \stdClass();
		$this->response->success = true;
	}

	public function index() {
		$this->response->militants = Militant::orderBy('id', 'desc')->paginate(30);
		return view('militants.list', ['response' => $this->response]);
	}

	public function create() {
		$this->response->militant = new Militant();
		return view('militants.store', ['response' => $this->response]);
	}

	public function edit($id) {
		// Get basic data
		$militant = Militant::find($id);
		$this->response->militant = $militant;
		// Get born address
		$born_address = $militant->born()->first();
		$this->response->militant->city_born = $born_address->city;
		$this->response->militant->state_born = $born_address->state;
		$this->response->militant->country_born = $born_address->country;
		// Get current address
		$current_address = $militant->address()->first();
		$this->response->militant->street = $current_address->street;
		$this->response->militant->number_exterior = $current_address->number_exterior;
		$this->response->militant->number_interior = $current_address->number_interior;
		$this->response->militant->neighborhood = $current_address->neighborhood;
		$this->response->militant->postal_code = $current_address->postal_code;
		$this->response->militant->city = $current_address->city;
		$this->response->militant->state = $current_address->state;
		$this->response->militant->country = $current_address->country;
		// Get father data
		$father = $militant->father()->first();
		$this->response->militant->father_first_name = $father->first_name;
		$this->response->militant->father_last_name_a = $father->last_name_a;
		$this->response->militant->father_last_name_b = $father->last_name_b;
		// Get mother data
		$mother = $militant->mother()->first();
		$this->response->militant->mother_first_name = $mother->first_name;
		$this->response->militant->mother_last_name_a = $mother->last_name_a;
		$this->response->militant->mother_last_name_b = $mother->last_name_b;
		return view('militants.store', ['response' => $this->response]);
	}

	public function store(Request $request) {

		$post_data = $request->all();

		$rules =  [
			'curp' 				=> 'required|size:18',
			'first_name' 		=> 'required',
			'last_name_a' 		=> 'required',
			'last_name_b' 		=> 'required',
			'birthday' 			=> 'required',
			'city_born' 		=> 'required',
			'state_born' 		=> 'required',
			'country_born' 		=> 'required',
			'civil_state' 		=> 'required',
			'occupation' 		=> 'required',
			'literate' 			=> 'required',
			'school_degree' 	=> 'required',
			'street' 			=> 'required',
			'number_exterior' 	=> 'required',
			'neighborhood' 		=> 'required',
			'postal_code' 		=> 'required',
			'city' 				=> 'required',
			'state' 			=> 'required',
			'country' 			=> 'required',
		];

		$messages = [
			'curp.required' 			=> 'Este campo es requerido',
			'curp.size' 				=> 'Tu CURP debe tener 18 caracteres',
			'first_name.required' 		=> 'Este campo es requerido',
			'last_name_a.required' 		=> 'Este campo es requerido',
			'last_name_b.required' 		=> 'Este campo es requerido',
			'birthday.required' 		=> 'Este campo es requerido',
			'city_born.required' 		=> 'Este campo es requerido',
			'state_born.required' 		=> 'Este campo es requerido',
			'country_born.required' 	=> 'Este campo es requerido',
			'civil_state.required' 		=> 'Este campo es requerido',
			'occupation.required' 		=> 'Este campo es requerido',
			'literate.required' 		=> 'Este campo es requerido',
			'school_degree.required' 	=> 'Este campo es requerido',
			'street.required' 			=> 'Este campo es requerido',
			'number_exterior.required' 	=> 'Este campo es requerido',
			'neighborhood.required' 	=> 'Este campo es requerido',
			'postal_code.required' 		=> 'Este campo es requerido',
			'city.required' 			=> 'Este campo es requerido',
			'state.required' 			=> 'Este campo es requerido',
			'country.required' 			=> 'Este campo es requerido',
		];

		$validator = Validator::make($post_data, $rules, $messages);

		if($validator->fails()) {
			return back()->withErrors($validator)->withInput($post_data);
		}

		// Define militant var
		$militant = null;

		// Check if data is for new militant or an edition of existent
		$militant_id = intval($request->input('militant_id'));
		if($militant_id != 0 && $militant_id != null) {
			$militant = Militant::find($militant_id);
		} else {
			$militant = new Militant();
		}

		// Set basic militant data
		$militant->curp 			= strtoupper(trim($request->input('curp')));
		$militant->class 			= trim($request->input('class'));
		$militant->enrollment 		= trim($request->input('enrollment'));
		$militant->first_name 		= trim($request->input('first_name'));
		$militant->last_name_a 		= trim($request->input('last_name_a'));
		$militant->last_name_b 		= trim($request->input('last_name_b'));
		$militant->birthday 		= trim($request->input('birthday'));
		$militant->civil_state 		= trim($request->input('civil_state'));
		$militant->occupation 		= trim($request->input('occupation'));
		$militant->literate 		= trim($request->input('literate'));
		$militant->school_degree 	= trim($request->input('school_degree'));
		$militant->save();

		// Set born address
		$address = null;
		if($militant->born_id) {
			$address = Address::find($militant->born_id);
		} else {
			$address = new Address();
		}

		$address->city 		= $request->input('city_born');
		$address->state 	= $request->input('state_born');
		$address->country 	= $request->input('country_born');
		$address->save(); 
		$address->born()->save($militant);

		// Set current address
		$address = null;
		if($militant->address_id) {
			$address = Address::find($militant->address_id);
		} else {
			$address = new Address();
		}

		$address->street = $request->input('street');
		$address->number_interior = $request->input('number_interior');
		$address->number_exterior = $request->input('number_exterior');
		$address->neighborhood = $request->input('neighborhood');
		$address->postal_code = $request->input('postal_code');
		$address->city = $request->input('city');
		$address->state = $request->input('state');
		$address->country = $request->input('country');
		$address->save();
		$address->address()->save($militant);

		// Set father data
		$parent = null;
		if($militant->father_id) {
			$parent = Family::find($militant->father_id);
		} else {
			$parent = new Family();
		}

		$parent->first_name = $request->input('father_first_name');
		$parent->last_name_a = $request->input('father_last_name_a');
		$parent->last_name_b = $request->input('father_last_name_b');
		$parent->save();
		$parent->father()->save($militant);

		// Set mother data
		$parent = null;
		if($militant->mother_id) {
			$parent = Family::find($militant->mother_id);
		} else {
			$parent = new Family();
		}

		$parent->first_name = $request->input('mother_first_name');
		$parent->last_name_a = $request->input('mother_last_name_a');
		$parent->last_name_b = $request->input('mother_last_name_b');
		$parent->save();
		$parent->mother()->save($militant);

		return redirect()->route('militants');
	}
	

	public function delete($id) {
		Militant::destroy($id);
		return redirect()->route('militants');
	}
}

// End of file