<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meses extends Model
{
	protected $table = 'meses';
	protected $fillable =['mes','estado','observacion','nro_planilla','tipo','beneficiario'];
}
