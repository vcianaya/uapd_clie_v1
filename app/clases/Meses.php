<?php

namespace App\clases;
class Meses
{
	var $ci;
	var $mes;
	var $observacion;
	var $nro_planilla;
	var $tipo;
	var $estado;
	function __construct($ci, $mes, $observacion, $nro_planilla, $tipo, $estado)
	{
		$this->ci = $ci;
		$this->mes = $mes;
		$this->observacion = $observacion;
		$this->nro_planilla = $nro_planilla;
		$this->tipo = $tipo;
		$this->estado = $estado;		
	}
}