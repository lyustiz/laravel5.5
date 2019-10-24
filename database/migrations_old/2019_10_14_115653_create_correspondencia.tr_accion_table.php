<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('correspondencia.tr_accion', function(Blueprint $table)
		{
			$table->integer('id_accion', true);
			$table->string('tx_accion');
			$table->integer('id_instruccion_usuario')->index('fki_tr_accion_tr_correspondencia_usuario');
			$table->integer('id_status')->index('fki_tr_accion_tr_status');
			$table->dateTime('fe_creado');
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
		Schema::drop('correspondencia.tr_accion');
	}

}
