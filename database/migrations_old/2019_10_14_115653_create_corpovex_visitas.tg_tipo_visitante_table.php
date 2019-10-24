<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipoVisitanteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corpovex_visitas.tg_tipo_visitante', function(Blueprint $table)
		{
			$table->integer('id_tipo_visitante', true);
			$table->string('nb_tipo_visitante')->nullable();
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
		Schema::drop('corpovex_visitas.tg_tipo_visitante');
	}

}
