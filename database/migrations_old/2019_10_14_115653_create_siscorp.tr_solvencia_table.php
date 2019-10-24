<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSolvenciaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_solvencia', function(Blueprint $table)
		{
			$table->integer('id_solvencia', true);
			$table->integer('id_contrato')->nullable();
			$table->string('co_solvencia', 50)->nullable();
			$table->dateTime('fe_solicitud')->nullable();
			$table->dateTime('fe_elaboracion')->nullable();
			$table->dateTime('fe_recepcion')->nullable();
			$table->string('tx_observaciones', 100)->nullable();
			$table->integer('id_tipo_solv')->nullable();
			$table->integer('id_embarque')->nullable();
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
		Schema::drop('siscorp.tr_solvencia');
	}

}
