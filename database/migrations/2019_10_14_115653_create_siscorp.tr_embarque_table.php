<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiscorp.trEmbarqueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_embarque', function(Blueprint $table)
		{
			$table->integer('id_embarque', true);
			$table->integer('id_oferta_com')->nullable();
			$table->integer('nu_bl')->nullable();
			$table->date('fe_esal')->nullable();
			$table->date('fe_eta')->nullable();
			$table->date('fe_arribo')->nullable();
			$table->integer('id_pais_orig')->nullable();
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
		Schema::drop('siscorp.tr_embarque');
	}

}
