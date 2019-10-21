<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContratoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_contrato', function(Blueprint $table)
		{
			$table->integer('id_contrato', true);
			$table->string('co_contrato', 50)->nullable();
			$table->dateTime('fe_notificacion_cons')->nullable();
			$table->dateTime('fe_firma')->nullable();
			$table->integer('id_regla_pago')->nullable();
			$table->string('tx_tiempo_entrega', 500)->nullable();
			$table->string('tx_objeto', 500)->nullable();
			$table->decimal('mo_contrato', 12)->nullable();
			$table->date('fe_contrato')->nullable();
			$table->integer('id_tipo_trans_pago')->nullable();
			$table->integer('id_moneda')->nullable();
			$table->string('tx_periodo', 30)->nullable();
			$table->integer('nu_lotes')->nullable();
			$table->integer('id_oferta_com')->nullable();
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
		Schema::drop('siscorp.tr_contrato');
	}

}
