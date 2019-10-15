<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVotaciones.tgEstadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('votaciones.tg_estado', function(Blueprint $table)
		{
			$table->integer('id_estado', true);
			$table->string('nb_estado', 100)->nullable();
			$table->string('tx_tipo_region', 200)->nullable();
			$table->integer('id_pais');
			$table->integer('id_status');
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_usuario');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('votaciones.tg_estado');
	}

}
