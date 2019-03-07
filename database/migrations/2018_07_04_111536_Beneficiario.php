<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Beneficiario extends Migration
{
	public function up()
	{
		Schema::create('beneficiario', function (Blueprint $table) {
			$table->increments('id')->nullable();
			$table->string('ci')->nullable();
			$table->string('nombre',255)->nullable();
			$table->string('apellido',255)->nullable();
			$table->date('fec_nac')->nullable();
			$table->string('sexo')->nullable();
			$table->string('lugar_nacimiento',550)->nullable();
			$table->string('domicilio',550)->nullable();
			$table->integer('distrito')->nullable();
			$table->integer('zona')->unsigned()->nullable();
			$table->foreign('zona')->references('id')->on('urbanizaciones')->onDelete('cascade');
			$table->string('estado_civil',225)->nullable();
			$table->string('grado_instruccion',225)->nullable();
			$table->string('ocupacion',350)->nullable();
			$table->integer('telefono')->nullable();
			$table->string('email')->nullable();
			$table->string('tipo_discapacidad',350)->nullable();
			$table->string('carnet_discapacidad')->nullable();
			$table->integer('porcentaje_discapacidad')->nullable();
			$table->string('deficiencia',550)->nullable();
			$table->date('vence')->nullable();
			$table->string('ayuda_tecnica',150)->nullable();
			$table->string('tipo_ayuda',150)->nullable();
			$table->string('otro',350)->nullable();
			$table->string('tratamiento',550)->nullable();
			$table->text('tratamiento_descripcion')->nullable();
			$table->string('vivienda',150)->nullable();
			$table->string('vivienda_otro',350)->nullable();
			$table->string('caso_ser',350)->nullable();
			$table->string('nombre_ser',350)->nullable();
			$table->string('apellido_ser',350)->nullable();
			$table->string('ci_ser')->nullable();
			$table->date('fec_nac_ser')->nullable();
			$table->string('sexo_ser',350)->nullable();
			$table->string('domicilio_ser',350)->nullable();
			$table->integer('zona_ser')->unsigned()->nullable();
			$table->foreign('zona_ser')->references('id')->on('urbanizaciones')->onDelete('cascade');
			$table->integer('distrito_ser')->nullable();
			$table->string('estado_civil_ser',150)->nullable();
			$table->string('grado_instruccion_ser',350)->nullable();
			$table->string('ocupacion_ser',350)->nullable();
			$table->string('telefono_ser',350)->nullable();
			$table->string('correo_ser',350)->nullable();
			$table->string('lugar',550)->nullable();
			$table->string('observaciones_ser',550)->nullable();
			$table->string('estado')->nullable();
			$table->integer('user')->unsigned()->nullable();
			$table->foreign('user')->references('id')->on('users')->onDelete('cascade');
			$table->text('latitud')->nullable();
			$table->text('longitud')->nullable();
			$table->timestamps();
		});
	}
	public function down()
	{
		Schema::dropIfExists('beneficiario');
	}
}
