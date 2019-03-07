<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Storage;
use Excel;

use App\Zona;
use App\Beneficiario;
use App\clases\Meses;
use App\Meses as Mes;
//TRANSFORMERS
use App\Transformers\BeneficiarioTransformer;
class BeneficiarioController extends Controller
{
	public function save_beneficiario(Request $request)
	{
		$beneficiario = new Beneficiario();
		$beneficiario->ci = $request->ci;
		$beneficiario->nombre = $request->nombre;
		$beneficiario->apellido = $request->apellido;
		$beneficiario->fec_nac = $request->fec_nac;
		$beneficiario->sexo = $request->genero;
		$beneficiario->lugar_nacimiento = $request->lugar_nacimiento;
		$beneficiario->domicilio = $request->domicilio;
		$beneficiario->distrito = $request->distrito;
		$beneficiario->zona = $request->zona;
		$beneficiario->estado_civil = $request->estado_civil;
		$beneficiario->grado_instruccion = $request->grado_instruccion;
		$beneficiario->ocupacion = $request->ocupacion;
		$beneficiario->telefono = $request->telefono;
		$beneficiario->email = $request->email;
		$beneficiario->tipo_discapacidad = $request->tipo_discapacidad;
		$beneficiario->carnet_discapacidad = $request->carnet_discapacidad;
		$beneficiario->porcentaje_discapacidad = $request->porcentaje_discapacidad;
		$beneficiario->deficiencia = $request->deficiencia;
		$beneficiario->vence = $request->vence;
		$beneficiario->ayuda_tecnica = $request->ayuda_tecnica;
		$beneficiario->tipo_ayuda = $request->tipo_ayuda_tecnica;
		$beneficiario->otro = $request->otro_ayuda_tecnica;
		$beneficiario->tratamiento  = $request->tratamiento_rehabilitacion;
		$beneficiario->tratamiento_descripcion = $request->tratamiento_descripcion;
		$beneficiario->vivienda = $request->vivienda;
		$beneficiario->vivienda_otro = $request->vivienda_otro;
		$beneficiario->caso_ser = $request->caso_ser;
		$beneficiario->nombre_ser = $request->nombre_ser;
		$beneficiario->apellido_ser = $request->apellido_ser;
		$beneficiario->ci_ser = $request->ci_ser;
		$beneficiario->sexo_ser = $request->genero_ser;
		$beneficiario->fec_nac_ser = $request->fec_nac_ser;
		$beneficiario->domicilio_ser = $request->domicilio_ser;
		$beneficiario->distrito_ser = $request->distrito_ser;
		$beneficiario->zona_ser = $request->zona_ser;
		$beneficiario->estado_civil_ser = $request->estado_civil_ser;
		$beneficiario->grado_instruccion_ser = $request->grado_instruccion_ser;
		$beneficiario->ocupacion_ser = $request->ocupacion_ser;
		$beneficiario->telefono_ser = $request->telefono_ser;
		$beneficiario->correo_ser = $request->email_ser;
		$beneficiario->lugar = $request->lugar;
		$beneficiario->observaciones_ser = $request->observaciones_ser;
		$beneficiario->latitud = $request->latitud;
		$beneficiario->longitud = $request->longitud;
		if ($beneficiario->save()) {
			return response()->json(['message'=>'Beneficiario registrado correctamente.','status'=>'success','icon'=>'fa fa-save']);
		}
	}

	public function update_beneficiario(Request $request)
	{
		$beneficiario = Beneficiario::find($request->id);
		($request->ci)? $beneficiario->ci = $request->ci: '';
		($request->nombre)? $beneficiario->nombre = $request->nombre: '';
		($request->apellido)? $beneficiario->apellido = $request->apellido: '';
		($request->fec_nac)? $beneficiario->fec_nac = $request->fec_nac: '';
		($request->genero)? $beneficiario->sexo = $request->genero: '';
		($request->lugar_nacimiento)? $beneficiario->lugar_nacimiento = $request->lugar_nacimiento: '';
		($request->domicilio)? $beneficiario->domicilio = $request->domicilio: '';
		($request->distrito)? $beneficiario->distrito = $request->distrito: '';
		($request->zona)? $beneficiario->zona = $request->zona: '';
		($request->estado_civil)? $beneficiario->estado_civil = $request->estado_civil: '';
		($request->grado_instruccion)? $beneficiario->grado_instruccion = $request->grado_instruccion: '';
		($request->ocupacion)? $beneficiario->ocupacion = $request->ocupacion: '';
		($request->telefono)? $beneficiario->telefono = $request->telefono: '';
		($request->email)? $beneficiario->email = $request->email: '';
		($request->tipo_discapacidad)? $beneficiario->tipo_discapacidad = $request->tipo_discapacidad: '';
		($request->carnet_discapacidad)? $beneficiario->carnet_discapacidad = $request->carnet_discapacidad: '';
		($request->porcentaje_discapacidad)? $beneficiario->porcentaje_discapacidad = $request->porcentaje_discapacidad: '';
		($request->deficiencia)? $beneficiario->deficiencia = $request->deficiencia: '';
		($request->vence)? $beneficiario->vence = $request->vence: '';
		($request->ayuda_tecnica)? $beneficiario->ayuda_tecnica = $request->ayuda_tecnica: '';
		($request->tipo_ayuda_tecnica)? $beneficiario->tipo_ayuda = $request->tipo_ayuda_tecnica: '';
		($request->otro_ayuda_tecnica)? $beneficiario->otro = $request->otro_ayuda_tecnica: '';
		($request->tratamiento_rehabilitacion)? $beneficiario->tratamiento  = $request->tratamiento_rehabilitacion: '';
		($request->tratamiento_descripcion)? $beneficiario->tratamiento_descripcion = $request->tratamiento_descripcion: '';
		($request->vivienda)? $beneficiario->vivienda = $request->vivienda: '';
		($request->vivienda_otro)? $beneficiario->vivienda_otro = $request->vivienda_otro: '';
		$beneficiario->caso_ser = $request->caso_ser;
		$beneficiario->nombre_ser = $request->nombre_ser;
		$beneficiario->apellido_ser = $request->apellido_ser;
		$beneficiario->ci_ser = $request->ci_ser;
		$beneficiario->sexo_ser = $request->genero_ser;
		$beneficiario->fec_nac_ser = $request->fec_nac_ser;
		$beneficiario->domicilio_ser = $request->domicilio_ser;
		$beneficiario->distrito_ser = $request->distrito_ser;
		$beneficiario->zona_ser = $request->zona_ser;
		$beneficiario->estado_civil_ser = $request->estado_civil_ser;
		$beneficiario->grado_instruccion_ser = $request->grado_instruccion_ser;
		$beneficiario->ocupacion_ser = $request->ocupacion_ser;
		$beneficiario->telefono_ser = $request->telefono_ser;
		$beneficiario->correo_ser = $request->email_ser;
		($request->lugar)? $beneficiario->lugar = $request->lugar: '';
		$beneficiario->observaciones_ser = $request->observaciones_ser;
		($request->latitud)? $beneficiario->latitud = $request->latitud: '';
		($request->longitud)? $beneficiario->longitud = $request->longitud: '';
		if ($beneficiario->save()) {
			return response()->json(['message'=>'Datos actualizados.','status'=>'warning','icon'=>'fa fa-edit']);
		}
	}
	public function get_zona($distrito)
	{
		$zona = Zona::select('id','nombre_urbanizacion')
		->where('distrito',$distrito)->get();
		return $zona;
	}

	public function get_beneficiarios()
	{
		$beneficiario = Beneficiario::all();
		// dd($beneficiario->count());
		return view('welcome');
	}

	public function get_beneficiario($id_beneficiario)
	{
		$beneficiario = Beneficiario::find($id_beneficiario);
		return $beneficiario;
	}
	public function victor(Request $request)
	{

		$columns = array(
			0 => 'ci',
			1 => 'nombre',
			2 => 'fec_nac',
			3 => 'carnet_discapacidad',
			4 => 'tipo_discapacidad',
			5 => 'vence',
			6 => 'caso_ser',
			7 => 'nombre_ser',
		);
		$totalData = Beneficiario::count();
		$totalFiltered = $totalData;
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value')))
		{
			$posts = Beneficiario::offset($start)
			->limit($limit)
			->orderBy($order,$dir)
			->get();
		}
		else {
			$search = $request->input('search.value');

			$posts =  Beneficiario::where('id','LIKE',"%{$search}%")
			->orWhere('ci', 'LIKE',"%{$search}%")
			->orWhere('nombre', 'LIKE',"%{$search}%")
			->orWhere('apellido', 'LIKE',"%{$search}%")
			->orWhere('sexo', 'LIKE',"%{$search}%")
			->orWhere('grado_instruccion', 'LIKE',"%{$search}%")
			->offset($start)
			->limit($limit)
			->orderBy($order,$dir)
			->get();

			$totalFiltered = Beneficiario::where('id','LIKE',"%{$search}%")
			->orWhere('ci', 'LIKE',"%{$search}%")
			->orWhere('nombre', 'LIKE',"%{$search}%")
			->orWhere('apellido', 'LIKE',"%{$search}%")
			->orWhere('sexo', 'LIKE',"%{$search}%")
			->orWhere('grado_instruccion', 'LIKE',"%{$search}%")
			->count();
		}

		$data = array();
		/*
		if(!empty($posts))
		{
			foreach ($posts as $post)
			{
				$nestedData['id'] = $post->id;
				$nestedData['ci'] = $post->ci;
				$nestedData['nombre'] = $post->nombre;
				$nestedData['apellido'] = (isset($post->apellido)) ? $post->apellido:" ";
				$nestedData['sexo'] = $post->sexo;
				$nestedData['grado_instruccion'] = "<a href='#'>HOLA</>";
				$data[] = $nestedData;
			}
		}
		*/
		return Response::json([
			'draw'				=> intval($request->input('draw')),
			'recordsTotal'		=> intval($totalData),
			'recordsFiltered'	=> intval($totalFiltered),
			"data"				=> $posts
		]);
	}

	public function buscar_beneficiario(Request $request)
	{
		$beneficiario = Beneficiario::where('ci',$request->ci)->get();
		$fractal = fractal()
		->collection($beneficiario)
		->transformWith(new BeneficiarioTransformer())
		// ->includeNinios()
		->includeMeses()
		->toArray();
		return response()->json($fractal);
	}
	//ACTUALIZACION MASIVA DEl ESTADO DE  LOS BENEFICIARIOS
	public function actualizacion_masiva(Request $request)
	{
		$fileName = $request->file('file')->store('excel');
		if (Storage::disk('local')->exists($fileName)) {
			Excel::load('public/storage/'.$fileName, function($reader) {
				$GLOBALS['excel'] = $reader->get();
			});
		}
		$modificados = 0;
		$errors = array();
		foreach ($GLOBALS['excel'] as $fila) {
			if ($fila->ci != '' or $fila->ci != null) {
				$modificados = $modificados+1;

				$beneficiario = Beneficiario::select('id','ci')->where('ci', trim($fila->ci))->first();
				//CASO1 INSERTANDO UN NUEVO REGISTRO
				if (count($beneficiario)>0) {
					$verificar = Mes::leftJoin('boleta','meses.id','=','boleta.mes')
												->where('meses.beneficiario','=', $beneficiario->id)
												->where('meses.mes','=', $request->mes)
												->select('boleta.id as id_boleta', 'meses.id as id_mes')
												->first();
						//NO EXISTE REGISTRO PORTANTO CREAMOS UNO NUEVO MES
						if(count($verificar) == 0){
							$mes = new Mes();
							$mes->mes = $request->mes;
							$mes->estado = $request->estado;
							$mes->observacion = $fila->observacion;
							$mes->nro_planilla = $fila->nro_planilla;
							$mes->tipo = $request->tipo;
							$mes->beneficiario = $beneficiario->id;
							$mes->save();
						}

						//EXISTE Y NO TIENE BOLETA GENERADA PROCEDE A ACTUALIZAR EL MES
						if(count($verificar)>0 && is_null($verificar->id_boleta) == true){
							$mes = Mes::find($verificar->id_mes);
							$mes->mes = $request->mes;
							$mes->estado = $request->estado;
							$mes->observacion = $fila->observacion;
							$mes->nro_planilla = $fila->nro_planilla;
							$mes->tipo = $request->tipo;
							$mes->beneficiario = $beneficiario->id;
							$mes->save();
						}
				}else{
					array_push($errors, new Meses($fila->ci, $request->mes, $fila->observacion, $fila->nro_planilla, $request->tipo,$request->estado));
				}
			}
		}
		Storage::delete($fileName);

		// return $GLOBALS['excel'];
		// return $modificados;
		return $GLOBALS['excel'];
		// return response()->json(['message'=>'Beneficiarios actualizados.','status'=>'success','icon'=>'fa fa-save']);
		// $errors = array();
		// array_push($errors,new Meses("Emero", "0","Actualizar datos", "32","45","asd"));
		// return response()->json($errors);
	}

  public function dt_get_beneficiarios(Request $request)
  {
    $columns = array(
      0 => 'ci',
      1 => 'nombre',
      2 => 'fec_nac',
      3 => 'carnet_discapacidad',
      4 => 'tipo_discapacidad',
      5 => 'vence',
      6 => 'caso_ser',
      7 => 'nombre_ser',
    );
    $totalData = Beneficiario::count();
    $totalFiltered = $totalData;
    $limit = $request->input('length');
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    if(empty($request->input('search.value')))
    {
      $posts = Beneficiario::offset($start)
      ->limit($limit)
      ->orderBy($order,$dir)
      ->get();
    }
    else {
      $search = $request->input('search.value');

      $posts =  Beneficiario::where('id','LIKE',"%{$search}%")
      ->orWhere('ci', 'LIKE',"%{$search}%")
      ->orWhere('nombre', 'LIKE',"%{$search}%")
      ->orWhere('apellido', 'LIKE',"%{$search}%")
      ->orWhere('sexo', 'LIKE',"%{$search}%")
      ->orWhere('grado_instruccion', 'LIKE',"%{$search}%")
      ->offset($start)
      ->limit($limit)
      ->orderBy($order,$dir)
      ->get();

      $totalFiltered = Beneficiario::where('id','LIKE',"%{$search}%")
      ->orWhere('ci', 'LIKE',"%{$search}%")
      ->orWhere('nombre', 'LIKE',"%{$search}%")
      ->orWhere('apellido', 'LIKE',"%{$search}%")
      ->orWhere('sexo', 'LIKE',"%{$search}%")
      ->orWhere('grado_instruccion', 'LIKE',"%{$search}%")
      ->count();
    }

    $data = array();
    /*
    if(!empty($posts))
    {
      foreach ($posts as $post)
      {
        $nestedData['id'] = $post->id;
        $nestedData['ci'] = $post->ci;
        $nestedData['nombre'] = $post->nombre;
        $nestedData['apellido'] = (isset($post->apellido)) ? $post->apellido:" ";
        $nestedData['sexo'] = $post->sexo;
        $nestedData['grado_instruccion'] = "<a href='#'>HOLA</>";
        $data[] = $nestedData;
      }
    }
    */
    return Response::json([
      'draw'        => intval($request->input('draw')),
      'recordsTotal'    => intval($totalData),
      'recordsFiltered' => intval($totalFiltered),
      "data"        => $posts
    ]);
  }

  
	public function url()
	{
		return sys_get_temp_dir();
	}
}
