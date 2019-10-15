<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTalentoHumanoOld.tgTipoEmpleadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('talento_humano_old.tg_tipo_empleado', function(Blueprint $table)
		{
			$table->integer('id_tipo_empleado', true);
			$table->string('nb_tipo_empleado', 30)->unique('tg_tipo_empleado_nb_tipo_empleado_unique');
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
		Schema::drop('talento_humano_old.tg_tipo_empleado');
	}

}
