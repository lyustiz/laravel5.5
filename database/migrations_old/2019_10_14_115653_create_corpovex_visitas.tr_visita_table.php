<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corpovex_visitas.tr_visita', function(Blueprint $table)
		{
			$table->integer('id_visita', true);
			$table->integer('id_visitante')->nullable();
			$table->integer('id_ced_empleado')->nullable();
			$table->integer('id_empresa')->nullable();
			$table->integer('id_tipo_visitante')->nullable();
			$table->text('tx_cargo')->nullable();
			$table->integer('id_motivo')->nullable();
			$table->string('tx_observaciones', 2000)->nullable();
			$table->decimal('nu_carnet', 5, 0)->nullable();
			$table->dateTime('fe_entrada')->nullable();
			$table->dateTime('fe_salida')->nullable();
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
		Schema::drop('corpovex_visitas.tr_visita');
	}

}
