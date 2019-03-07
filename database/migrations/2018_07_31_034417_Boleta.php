<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Boleta extends Migration
{
		public function up()
		{
				Schema::create('boleta', function (Blueprint $table) {
						$table->increments('id')->nullable();
						$table->integer('estado')->default(1);
						$table->integer('monto')->default(250);
						$table->integer('user')->unsigned()->nullable();
						$table->foreign('user')->references('id')->on('users')->onDelete('cascade');
						$table->integer('mes')->unsigned()->nullable();
						$table->foreign('mes')->references('id')->on('meses')->onDelete('cascade');
						$table->timestamps();
				});
		}
		public function down()
		{
				Schema::dropIfExists('boleta');
		}
}
