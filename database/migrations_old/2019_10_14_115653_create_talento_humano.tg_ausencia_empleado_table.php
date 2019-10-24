<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTalentoHumano.tgAusenciaEmpleadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('talento_humano.tg_ausencia_empleado', function(Blueprint $table)
		{
			$table->integer('id_ausencia_empleado', true);
			$table->integer('id_tipo_ausencia');
			$table->dateTime('fe_inicio');
			$table->dateTime('fe_fin');
			$table->string('tx_observaciones', 500);
			$table->integer('id_status');
			$table->integer('id_usuario');
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_empleado')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('talento_humano.tg_ausencia_empleado');
	}

}
