<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoletaAnulada extends Model
{
  protected $table = 'boleta_anulada';
  protected $fillable =['nro_boleta','ci','beneficiario','carnet_discapacidad','vence','fecha_emision','emitido_por','observacion','user'];
}
