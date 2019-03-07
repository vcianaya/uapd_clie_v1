<?php

namespace App\Transformers;

use App\Boleta;
use League\Fractal\TransformerAbstract;

class BoletaTransformer extends TransformerAbstract
{
    public function transform(Boleta $boleta){
        return [
            'id'=>$boleta->id,
            'estado'=>$boleta->estado,
            'monto'=> $boleta->monto,
            'created_at'=>$boleta->created_at,
            'usuario'=>$boleta->nombre.' '.$boleta->apellido
        ];
    }
}