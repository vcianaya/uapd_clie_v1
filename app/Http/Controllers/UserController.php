<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Response;
use App\User;

class UserController extends Controller
{
	public function create_user(Request $request)
	{
		$this->validate($request, [
				'email' => 'unique:users',
				'ci' => 'unique:users'
		]);
		$user = new User();
		$user->nombre = $request->nombre;
		$user->apellido = $request->apellido;
		$user->ci = $request->ci;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->save();
		return response()->json(['message'=>'Usuario registrado correctamente.','status'=>'success','icon'=>'fa fa-save']);
	}

	public function update_user(Request $request)
	{
		$user = User::find($request->id);
		$user->nombre = $request->nombre;
		$user->apellido = $request->apellido;
		$user->ci = $request->ci;
		$user->email = $request->email;
		if (!is_null($request->password)) {
			$user->password = $request->password;
		}
		$user->save();
		return response()->json(['message'=>'Datos actualizados correctamente.','status'=>'success','icon'=>'fa fa-save']);
	}
	
	public function get_users()
	{
		return User::all();
	}
}