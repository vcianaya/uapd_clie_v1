<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Response;
class RolePermissionController extends Controller
{
	public function create_rol(Request $request)
	{
		$role = Role::create(['name' => $request->nombre]);

		return response()->json(['message'=>'Rol creaado','status'=>'success','icon'=>'fa fa-save']);
	}

	public function get_roles()
	{
		$users = Role::all();
		return $users;
	}

	public function get_permissions($id_rol)
	{
		$permissions = Permission::all();
		$permissions_role = DB::table('role_has_permissions')
		->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
		->select('permissions.id')
		->where('role_has_permissions.role_id',$id_rol)
		->get();
		return response()->json(['permissions'=>$permissions,'permissions_role'=>$permissions_role]);
	}

	public function add_permission_role(Request $request)
	{
		DB::table('role_has_permissions')->insert(
			['permission_id' => $request->permission_id, 'role_id' => $request->rol_id]
		);
		return $request->all();
	}

	public function rm_permission_role(Request $request)
	{
		DB::table('role_has_permissions')
		->where('permission_id', $request->permission_id)
		->where('role_id', $request->rol_id)
		->delete();
		return $request->all();
	}

	public function add_role_user(Request $request)
	{
		$role_user = DB::table('user_has_roles')
		->where('user_id',$request->user_id)
		->count();
		if ($role_user == 0) {
			DB::table('user_has_roles')->insert(
				['user_id' => $request->user_id, 'role_id' => $request->role_id]
			);
			return response()->json(['message'=>'Rol asignado','status'=>'success','icon'=>'fa fa-save',]);
		}else{
			DB::table('user_has_roles')
			->where('user_id',$request->user_id)
      ->update(['role_id' => $request->role_id]);
			return response()->json(['message'=>'Rol actualizado','status'=>'warning','icon'=>'fa fa-save']);
		}
		
	}

	public function get_role_user($id_user)
	{
		$role_user = DB::table('user_has_roles')
		->join('roles', 'user_has_roles.role_id', '=', 'roles.id')
		->select('roles.id','roles.name')
		->where('user_has_roles.user_id',$id_user)
		->first();
		return response()->json($role_user);
	}
}