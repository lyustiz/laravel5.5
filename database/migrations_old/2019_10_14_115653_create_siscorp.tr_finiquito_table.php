<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFiniquitoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_finiquito', function(Blueprint $table)
		{
			$table->integer('id_finiquito', true);
			$table->integer('id_contrato')->nullable();
			$table->string('co_finiquito', 50)->nullable();
			$table->dateTime('fe_solicitud')->nullable();
			$table->dateTime('fe_elaboracion')->nullable();
			$table->dateTime('fe_firma')->nullable();
			$table->string('tx_observaciones', 500)->nullable();
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
		Schema::drop('siscorp.tr_finiquito');
	}

}
