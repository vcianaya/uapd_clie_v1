<?php

namespace App\Transformers;

use App\Beneficiario;
use App\Meses;
use League\Fractal\TransformerAbstract;
use App\Transformers\MesTransformer;
class BeneficiarioTransformer extends TransformerAbstract
{
	protected $availableIncludes  = [
		'meses'
	];
	public function transform(Beneficiario $beneficiario){
		return [
			'nombre'=>$beneficiario->nombre.' '.$beneficiario->apellido,
			'tutor'=>$beneficiario->nombre_ser.' '.$beneficiario->apellido_ser,
			'ci_tutor'=>$beneficiario->ci_ser,
			'carnet_discapacidad'=>$beneficiario->carnet_discapacidad,
			'vence'=>$beneficiario->vence,
			'tipo_discapacidad'=>$beneficiario->tipo_discapacidad
		];
	}
	public function includeMeses(Beneficiario $beneficiario){
		$meses = Meses::select('*')
		        ->where('beneficiario',$beneficiario->id)
		        ->orderBy('mes', 'asc')
		        ->get();
		return $this->collection($meses, new MesTransformer);
	}
}