<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSistemas.tgModulosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sistemas.tg_modulos', function(Blueprint $table)
		{
			$table->integer('id_modulo', true);
			$table->integer('id_sistema')->nullable();
			$table->string('nb_modulo', 300);
			$table->string('tx_descripcion', 500)->nullable();
			$table->integer('id_estatus')->nullable();
			$table->integer('nu_orden')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sistemas.tg_modulos');
	}

}
