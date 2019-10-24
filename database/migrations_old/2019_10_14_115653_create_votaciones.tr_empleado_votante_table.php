<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVotaciones.trEmpleadoVotanteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('votaciones.tr_empleado_votante', function(Blueprint $table)
		{
			$table->integer('id_empleado_votante', true);
			$table->integer('id_empleado')->nullable();
			$table->integer('id_votante')->nullable();
			$table->boolean('bo_confirmado')->nullable();
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
		Schema::drop('votaciones.tr_empleado_votante');
	}

}
