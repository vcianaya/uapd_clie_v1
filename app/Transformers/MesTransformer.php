<?php

namespace App\Transformers;

use App\Meses;
use App\Boleta;
use League\Fractal\TransformerAbstract;
use App\Transformers\BoletaTransformer;
class MesTransformer extends TransformerAbstract
{
	  protected $defaultIncludes = [
        'boleta'
    ];
    public function transform(Meses $mes){
        return [
            'id'=>$mes->id,
            'mes'=>$mes->mes,
            'nombre_mes'=> $this->getMes($mes->mes),
            'nro_planilla'=>$mes->nro_planilla,
            'observacion'=>$mes->observacion,
            'estado'=>$this->estado($mes->estado)
        ];
    }

    public function includeBoleta(Meses $mes){
		$boleta = Boleta::join('users','users.id','=','boleta.user')
                ->select('boleta.id','boleta.estado','boleta.monto','boleta.mes','boleta.created_at','users.nombre','users.apellido')
                ->where('mes',$mes->id)
		        ->where('estado',1)
		        ->get();
		return $this->collection($boleta, new BoletaTransformer);
	}

    function getMes($mes)
    {
    	switch ($mes) {
    		case '1':
    			return "ENERO";
    			break;
    		case '2':
    			return "FEBRERO";
    			break;
    		case '3':
    			return "MARZO";
    			break;
    		case '4':
    			return "ABRIL";
    			break;
    		case '5':
    			return "MAYO";
    			break;
    		case '6':
    			return "JUNIO";
    			break;
    		case '7':
    			return "JULIO";
    			break;
    		case '8':
    			return "AGOSTO";
    			break;
    		case '9':
    			return "SEPTIEMBRE";
    			break;
    		case '10':
    			return "OCTUBRE";
    			break;
    		case '11':
    			return "NOVIEMBRE";
    			break;
    		case '12':
    			return "DICIEMBRE";
    			break;
    		default:
    			# code...
    			break;
    	}
    }

    function estado($estado)
    {
    	switch ($estado) {
    		case '0':
    			return "INHABILITADO";
    			break;
    		case '1':
    			return "HABILITADO";
    			break;
    		default:
    			# code...
    			break;
    	}
    }
}