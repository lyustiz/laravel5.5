<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitanteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corpovex_visitas.tg_visitante', function(Blueprint $table)
		{
			$table->integer('id_visitante', true);
			$table->string('tx_nombres', 50)->nullable();
			$table->string('tx_apellidos', 50)->nullable();
			$table->string('nu_cedula', 10)->nullable();
			$table->string('tx_nacionalidad', 1)->nullable();
			$table->string('tx_foto')->nullable();
			$table->string('tx_cod_pais')->nullable();
			$table->string('tx_telefono', 20)->nullable();
			$table->integer('id_status')->nullable();
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_usuario')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('corpovex_visitas.tg_visitante');
	}

}
