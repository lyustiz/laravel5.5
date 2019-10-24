<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfertaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_oferta', function(Blueprint $table)
		{
			$table->integer('id_oferta', true);
			$table->string('co_doc_condiciones', 50)->nullable();
			$table->date('fe_doc_cond')->nullable();
			$table->date('fe_sol_ofcom')->nullable();
			$table->date('fe_max_recep_ofcom')->nullable();
			$table->date('fe_recepcion_ofcom')->nullable();
			$table->integer('id_usuario_imp')->nullable();
			$table->integer('id_usuario_seg')->nullable();
			$table->integer('id_solicitud')->nullable();
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
		Schema::drop('siscorp.tr_oferta');
	}

}
