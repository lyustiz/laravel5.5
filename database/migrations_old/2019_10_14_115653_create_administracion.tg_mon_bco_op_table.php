<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonBcoOpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('administracion.tg_mon_bco_op', function(Blueprint $table)
		{
			$table->integer('id_mon_bco_op', true);
			$table->integer('id_moneda_banco')->nullable();
			$table->string('tx_campo_op', 150)->nullable();
			$table->string('tx_valor_op', 150)->nullable();
			$table->string('co_sap_op', 10)->nullable();
			$table->string('tx_descripcion', 100)->nullable();
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
		Schema::drop('administracion.tg_mon_bco_op');
	}

}
