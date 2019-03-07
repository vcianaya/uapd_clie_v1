<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Tymon\JWTAuth\JWTAuth;
use JWTAuth;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AuthController extends Controller
{

	public function login(Request $request)
	{
		// grab credentials from the request
		$credentials = $request->only('email', 'password');
		try {
			// attempt to verify the credentials and create a token for the user
			if (! $token = JWTAuth::attempt($credentials)) {
				return response()->json('Credenciales invalidas', 401);
			}
		} catch (JWTException $e) {
			// something went wrong whilst attempting to encode the token
			return response()->json(['error' => 'No se pudo crear el token'], 500);
		}
		// all good so return the token
		$user = JWTAuth::authenticate($token);
		$permisos = Role::join('user_has_roles','roles.id','=','user_has_roles.role_id')
									->join('role_has_permissions','role_has_permissions.role_id','=','roles.id')
									->join('permissions','permissions.id','=','role_has_permissions.permission_id')
									->select('permissions.name as permiso','roles.name as role')
									->where('user_has_roles.user_id',$user->id)
									->get();


		return response()->json(compact('token','user', 'permisos'));
	}

	public function getAuthenticatedUser()
	{
		try {

			if (! $user = JWTAuth::parseToken()->authenticate()) {
				return response()->json(['user_not_found'], 404);
			}

		} catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

			return response()->json(['token_expired'], $e->getStatusCode());

		} catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

			return response()->json(['token_invalid'], $e->getStatusCode());

		} catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

			return response()->json(['token_absent'], $e->getStatusCode());

		}

	// the token is valid and we have found the user via the sub claim
		return response()->json(compact('user'));
	}

	public function refresh(Request $request)
	{
		$token = JWTAuth::getToken();
		$token = JWTAuth::refresh($token);
		return response()->json(compact('token'));
	}

	public function logout()
	{
		$token = JWTAuth::getToken();
		// JWTAuth::invalidate($token);
		return response()->json(['logout']);
	}
	public function prueba($id_user)
	{
    $role = RoleUser::where('user_id',$id_user)->first();
		$permissions = Role::find($role->role_id)->getPermissions();
		return response()->json($permissions);
	}
}