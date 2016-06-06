<?php

namespace App\Http\Controllers;

use Hash;
use Validator;
use Session;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\User;

class InstallController extends Controller {
	
	public function index() {
		return view('admin.install');
	}

	public function makeInstall(Request $request) {

		$post_data = $request->all();

		$rules =  [
			'name' => 'required|max:255',
			'email' => 'required|unique:users|email|max:255',
			'password' => 'required|confirmed|min:8',
		];

		$messages = [
			'name.required' => 'Debes introducir tu nombre completo',
			'name.max' => 'Tu nombre no puede exceder los 255 caracteres',
			'email.required' => 'Debes introducir tu correo electrónico',
			'email.unique' => 'El correo que deseas utilizar ya se encuentra registrado',
			'email.max' => 'Tu correo no puede exceder los 255 caracteres',
			'password.required' => 'Debes introducir tu contraseña',
			'password.confirmed' => 'Las contraseñas no coinciden',
			'password.min' => 'La contraseña debe tener al menos 8 caracteres',
		];

		$validator = Validator::make($post_data, $rules, $messages);

		if($validator->fails()) {
			return back()->withErrors($validator)->withInput($post_data);
		}

		// Create user admin data
		$user = new User();
		$user->name  = $request->input('name');
		$user->email  = $request->input('email');
		$user->password  = Hash::make($request->input('password'));
		$user->type = 'admin';

		// Save user admin data
		if(!$user->save()) {
			$validator->getMessageBag()->add('invalid', 'La instalación no se pudo realizar correctamente, intentelo de nuevo');
			return back()->withErrors($validator)->withInput($post_data);
		}

		return redirect()->route('home');
	}
}
