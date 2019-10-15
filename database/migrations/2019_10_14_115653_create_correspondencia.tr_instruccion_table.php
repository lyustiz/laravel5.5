<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorrespondencia.trInstruccionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('correspondencia.tr_instruccion', function(Blueprint $table)
		{
			$table->integer('id_instruccion', true);
			$table->string('tx_instruccion');
			$table->integer('id_instruccion_padre');
			$table->integer('nu_orden');
			$table->integer('nu_prioridad');
			$table->integer('id_correspondencia')->index('fki_tr_instruccion_tr_correspondencia');
			$table->integer('id_status');
			$table->dateTime('fe_creado');
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_usuario');
			$table->integer('nu_nivel');
			$table->integer('id_correspondencia_anexo');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('correspondencia.tr_instruccion');
	}

}
