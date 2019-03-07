<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Meses extends Migration
{
	public function up()
	{
		Schema::create('meses', function (Blueprint $table) {
			$table->increments('id')->nullable();
			$table->string('mes')->nullable();
			$table->string('tipo')->nullable();
			$table->integer('estado')->nullable();
			$table->text('observacion')->nullable();
			$table->integer('nro_planilla')->nullable();
			$table->integer('beneficiario')->unsigned()->nullable();
			$table->foreign('beneficiario')->references('id')->on('beneficiario')->onDelete('cascade');
			$table->timestamps();
		});
	}
	public function down()
	{
		Schema::dropIfExists('meses');
	}
}
