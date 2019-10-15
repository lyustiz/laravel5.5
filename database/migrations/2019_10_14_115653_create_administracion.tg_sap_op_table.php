<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdministracion.tgSapOpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('administracion.tg_sap_op', function(Blueprint $table)
		{
			$table->integer('id_sap_op', true);
			$table->string('nb_sap_op', 10)->nullable();
			$table->string('tx_sap_tp', 1)->nullable();
			$table->integer('id_status')->nullable();
			$table->date('fe_creado')->nullable();
			$table->date('fe_actualizado')->nullable();
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
		Schema::drop('administracion.tg_sap_op');
	}

}
