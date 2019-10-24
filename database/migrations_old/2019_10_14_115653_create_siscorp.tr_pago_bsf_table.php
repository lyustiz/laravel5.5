<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagoBsfTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_pago_bsf', function(Blueprint $table)
		{
			$table->integer('id_pago', true);
			$table->string('co_referencia', 30)->nullable();
			$table->dateTime('fe_pago')->nullable();
			$table->decimal('mo_pago', 12)->nullable();
			$table->integer('id_banco_ente')->nullable();
			$table->integer('id_banco_corp')->nullable();
			$table->dateTime('fe_recepcion_notif')->nullable();
			$table->dateTime('fe_notificacion_pago')->nullable();
			$table->dateTime('fe_notif_imp')->nullable();
			$table->string('tx_observaciones', 500)->nullable();
			$table->integer('id_oferta_com')->nullable();
			$table->integer('id_moneda')->nullable();
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
		Schema::drop('siscorp.tr_pago_bsf');
	}

}
