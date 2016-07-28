<?php

namespace App\Http\Controllers;

use Hash;
use Validator;

use Illuminate\Http\Request;
use App\Http\Requests;

// Models
use App\Models\User;

class AdminController extends Controller {
	
	public $response;

	public function __construct() {
		$this->response = new \stdClass();
		$this->response->success = true;
	}

	public function changePassword(Request $request) {

		// Store new password
		if($request->input()) {

			$post_data = $request->all();

			$rules =  [
				'old_password' => 'required',
				'password' => 'required|confirmed|min:8',
			];

			$messages = [
				'old_password.required' => 'Debes introducir tu contraseña anterior para asignar una nueva',
				'password.required' => 'Debes introducir tu contraseña nueva',
				'password.confirmed' => 'Las contraseñas nuevas no coinciden',
				'password.min' => 'La contraseña nueva debe tener al menos 8 caracteres',
			];

			$validator = Validator::make($post_data, $rules, $messages);

			if($validator->fails()) {
				return back()->withErrors($validator)->withInput($post_data);
			}

			// Get user data
			$user = $request->user();

			// Check if the old password match
			if(!Hash::check($request->input('old_password'), $user->password)) {
				$validator->getMessageBag()->add('old_password', 'La contraseña anterior no es correcta');
				return back()->withErrors($validator)->withInput($post_data);	
			}

			// Save the new password
			$user->password = Hash::make($request->input('password'));
			if($user->save()) {
				return redirect()->route('home');
			}
			
		} 

		return view('admin.changePassword', ['response' => $this->response]);

	}
}

// End of file