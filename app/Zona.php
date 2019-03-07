<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
	protected $table = 'urbanizaciones';
	protected $fillable =['distrito','nombre_urbanizacion','lat','lng'];
	public $timestamps = false;
}
