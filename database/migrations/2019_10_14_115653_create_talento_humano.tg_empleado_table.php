<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTalentoHumano.tgEmpleadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('talento_humano.tg_empleado', function(Blueprint $table)
		{
			$table->string('nb_nombre', 30);
			$table->string('nb_apellido', 30);
			$table->string('nu_cedula', 12)->unique('tg_empleado_nu_cedula_unique');
			$table->integer('id_tipo_empleado');
			$table->integer('id_ubicacion');
			$table->integer('id_supervisor');
			$table->integer('id_status');
			$table->integer('id_usuario');
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
			$table->string('tx_email', 40)->nullable();
			$table->integer('id_empleado')->nullable()->unique('tg_empleado_id_empleado_key');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('talento_humano.tg_empleado');
	}

}
