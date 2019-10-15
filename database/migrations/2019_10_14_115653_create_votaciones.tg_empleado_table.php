<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVotaciones.tgEmpleadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('votaciones.tg_empleado', function(Blueprint $table)
		{
			$table->integer('id_empleado', true);
			$table->string('nb_nombres', 50)->nullable();
			$table->string('nb_apellidos', 50)->nullable();
			$table->string('nu_cedula', 10)->nullable();
			$table->string('tx_telefono', 20)->nullable();
			$table->integer('id_dependencia')->nullable();
			$table->integer('id_empresa')->nullable();
			$table->integer('id_estado')->nullable();
			$table->boolean('bo_confirmado')->nullable()->default(0);
			$table->string('tx_observaciones', 100)->nullable();
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
		Schema::drop('votaciones.tg_empleado');
	}

}
