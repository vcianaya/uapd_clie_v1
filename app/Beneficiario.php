<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    protected $table = 'beneficiario';
    protected $fillable =['ci','nombre','apellido','fec_nac','sexo','lugar_nacimiento','domicilio','distrito','zona','estado_civil','grado_instruccion','ocupacion','telefono','email','tipo_discapacidad','carnet_discapacidad', 'porcentaje_discapacidad','deficiencia','vence','ayuda_tecnica','tipo_ayuda','otro','tratamiento','tratamiento_descripcion','vivienda','vivienda_otro','caso_ser','nombre_ser','apellido_ser','ci_ser','fec_nac_ser','domicilio_ser','zona_ser','distrito_ser','estado_civil_ser','grado_instruccion_ser','ocupacion_ser','telefono_ser','correo_ser','observaciones_ser','user','latitud','longitud'];
}



