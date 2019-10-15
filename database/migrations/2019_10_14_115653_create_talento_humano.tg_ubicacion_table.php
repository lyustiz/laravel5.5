<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTalentoHumano.tgUbicacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('talento_humano.tg_ubicacion', function(Blueprint $table)
		{
			$table->integer('id_ubicacion', true);
			$table->string('nb_ubicacion', 50);
			$table->string('co_ubicacion', 50)->unique('tg_ubicacion_co_ubicacion_unique');
			$table->string('tx_descripcion', 50);
			$table->integer('nu_nivel');
			$table->integer('id_padre');
			$table->integer('id_status');
			$table->integer('id_usuario');
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('talento_humano.tg_ubicacion');
	}

}
