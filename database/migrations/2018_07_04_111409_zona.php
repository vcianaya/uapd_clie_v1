<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Zona extends Migration
{
	public function up()
	{
		Schema::create('urbanizaciones', function (Blueprint $table) {
			$table->increments('id');
			$table->string('distrito');
			$table->string('nombre_urbanizacion', 255);
			$table->text('lat');
			$table->text('lng');
		});
	}
	public function down()
	{
		Schema::drop('urbanizaciones');
	}
}
