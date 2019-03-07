<?php

use Illuminate\Http\Request;

//AUTH CONTROLLER
Route::group(['prefix' => 'auth'], function ($router) {
		Route::post('login', 'AuthController@login');
		Route::get('logout', 'AuthController@logout');
		Route::post('refresh', 'AuthController@refresh');
		Route::post('me', 'AuthController@me');
});

// 

Route::middleware(['jwt.auth'])->group(function () {
	Route::post('save_beneficiario','BeneficiarioController@save_beneficiario');
	Route::post('update_beneficiario','BeneficiarioController@update_beneficiario');
	Route::get('get_zona/{id}','BeneficiarioController@get_zona');
	Route::get('get_beneficiario/{id}','BeneficiarioController@get_beneficiario');
	Route::post('buscar_beneficiario','BeneficiarioController@buscar_beneficiario');
	Route::get('buscar_boleta/{id_boleta}', 'PagoController@buscar_boleta');
	Route::post('eliminar_boleta','PagoController@eliminar_boleta');
	Route::get('get_boletas_eliminadas', 'PagoController@get_boletas_eliminadas');
	//IMPIRMIR BOLETA DE PAGO
	Route::post('generar_boleta','PagoController@generar_boleta');
	//ACTUALIZACION MASIVA
	Route::post('actualizacion_masiva','BeneficiarioController@actualizacion_masiva');
	//USUARIOS
	Route::post('create_user','UserController@create_user');
	Route::post('update_user','UserController@update_user');
	Route::get('get_users','UserController@get_users');
	//DATATABLES
	Route::any('victor','BeneficiarioController@victor');
	Route::any('dt_get_beneficiarios','BeneficiarioController@dt_get_beneficiarios');
		
	

	//ROLES Y PERMISOS
	Route::post('create_rol','RolePermissionController@create_rol');
	Route::get('get_roles','RolePermissionController@get_roles');
	Route::get('get_permissions/{id_rol}','RolePermissionController@get_permissions');
	Route::post('add_permission_role','RolePermissionController@add_permission_role');
	Route::post('rm_permission_role','RolePermissionController@rm_permission_role');
	Route::post('add_role_user','RolePermissionController@add_role_user');
	Route::get('get_role_user/{id_user}','RolePermissionController@get_role_user');
});



Route::get('imprimir_boleta_mes/{id_mes}','PagoController@imprimir_boleta_mes');
Route::get('imprimir_boleta_mes_id_boleta/{id_boleta}','PagoController@imprimir_boleta_mes_id_boleta');


Route::get('url','BeneficiarioController@url');