<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Response;
use Auth;

use App\Boleta;
use App\Meses;
use App\BoletaAnulada;
class PagoController extends Controller
{
	public function imprimir_boleta_mes($id_mes)
	{
		$boleta = Meses::join('boleta', 'boleta.mes', '=', 'meses.id')
							->join('beneficiario', 'beneficiario.id', '=', 'meses.beneficiario')
							->select('beneficiario.nombre', 'beneficiario.apellido','beneficiario.ci','beneficiario.nombre_ser', 'beneficiario.apellido_ser','beneficiario.ci_ser','meses.mes','boleta.monto','boleta.created_at','boleta.id','meses.nro_planilla')
							->where('boleta.mes',$id_mes)							
							->first();
							
		$pdf = new PDF();
		$pdf = PDF::setPaper("A4", "portrait");
		$pdf = PDF::loadView('boleta', ['boleta'=>$boleta]);
		return $pdf->stream('boleta_pago.pdf');		
	}

	public function imprimir_boleta_mes_id_boleta($id_boleta)
	{
		$boleta = Meses::join('boleta', 'boleta.mes', '=', 'meses.id')
							->join('beneficiario', 'beneficiario.id', '=', 'meses.beneficiario')
							->select('beneficiario.nombre', 'beneficiario.apellido','beneficiario.ci','beneficiario.nombre_ser', 'beneficiario.apellido_ser','beneficiario.ci_ser','meses.mes','boleta.monto','boleta.created_at','boleta.id','meses.nro_planilla')
							->where('boleta.id',$id_boleta)							
							->first();
							
		$pdf = new PDF();
		$pdf = PDF::setPaper("A4", "portrait");
		$pdf = PDF::loadView('boleta', ['boleta'=>$boleta]);
		return $pdf->stream('boleta_pago.pdf');		
	}

	public function generar_boleta(Request $request)
	{
		$boleta = new Boleta();
		$boleta->mes = $request->id_mes;
		$boleta->user = Auth::user()->id;
		$boleta->save();
		return response()->json(['url'=>'http://localhost/uapd2/public/api/imprimir_boleta_mes/'.$request->id_mes]);
	}

	public function buscar_boleta($id_boleta)
	{
		$boleta = Boleta::join('meses', 'meses.id','=','boleta.mes')
							->join('beneficiario','meses.beneficiario','=','beneficiario.id')
							->join('users','boleta.user','=','users.id')
							->select('beneficiario.carnet_discapacidad','beneficiario.ci','beneficiario.nombre', 'beneficiario.apellido','meses.mes','meses.nro_planilla','boleta.id as id_boleta','users.nombre as user_name','users.apellido as user_apellido','boleta.created_at','beneficiario.vence')
							->where('boleta.id','=',$id_boleta)
							->first();
			return response()->json(['boleta'=>$boleta]);
	}

	public function eliminar_boleta(Request $request)
	{
		$boleta = Boleta::find($request->id_boleta);
		if ($boleta->delete()) {
			$boleta_anulada = new BoletaAnulada;
			$boleta_anulada->nro_boleta = $request->id_boleta;
			$boleta_anulada->ci = $request->ci;
			$boleta_anulada->beneficiario = $request->nombre.' '.$request->apellido;
			$boleta_anulada->carnet_discapacidad = $request->carnet_discapacidad;
			$boleta_anulada->vence = $request->vence;
			$boleta_anulada->fecha_emision = $request->created_at;
			$boleta_anulada->emitido_por = $request->user_name.' '.$request->user_apellido;
			$boleta_anulada->observacion = $request->observacion;
			$boleta_anulada->user = Auth::user()->id;
			$boleta_anulada->save();
			return $request->all();
		}else{
			return response()->json(['message'=>'Error al eliminar la boleta']);
		}
	}
	public function get_boletas_eliminadas()
	{
		return BoletaAnulada::orderBy('created_at', 'asc')
				->get();
	}
}
