<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BoletaAnulada extends Migration
{
		public function up()
		{
				Schema::create('boleta_anulada', function (Blueprint $table) {
						$table->increments('id');
						$table->integer('nro_boleta');
						$table->string('ci');
						$table->string('beneficiario');
						$table->string('carnet_discapacidad');
						$table->string('vence');
						$table->string('fecha_emision');
						$table->string('emitido_por');
						$table->text('observacion');
						$table->integer('user')->unsigned()->nullable();
						$table->foreign('user')->references('id')->on('users')->onDelete('cascade');
						$table->timestamps();
				});
		}
		public function down()
		{
				Schema::dropIfExists('boleta_anulada');
		}
}
