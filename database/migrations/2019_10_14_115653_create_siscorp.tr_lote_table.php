<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiscorp.trLoteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_lote', function(Blueprint $table)
		{
			$table->integer('id_lote', true);
			$table->integer('id_contrato')->nullable();
			$table->integer('nu_lote')->nullable();
			$table->string('nb_lote', 50)->nullable();
			$table->integer('nu_dias')->nullable();
			$table->decimal('mo_lote_div', 12)->nullable();
			$table->integer('id_puerto_carg')->nullable();
			$table->integer('id_puerto_desc')->nullable();
			$table->string('tx_observaciones', 500)->nullable();
			$table->integer('id_status')->nullable();
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
		Schema::drop('siscorp.tr_lote');
	}

}
