<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitanteAlertaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corpovex_visitas.tr_visitante_alerta', function(Blueprint $table)
		{
			$table->integer('id_visitante_alerta', true);
			$table->integer('id_visitante')->nullable();
			$table->integer('id_tipo_alerta')->nullable();
			$table->integer('id_visita')->nullable();
			$table->string('tx_motivo_alerta')->nullable();
			$table->string('tx_anulacion')->nullable();
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
		Schema::drop('corpovex_visitas.tr_visitante_alerta');
	}

}
