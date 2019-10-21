<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagoDivTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_pago_div', function(Blueprint $table)
		{
			$table->integer('id_pago_div', true);
			$table->date('fe_recepcion_adm')->nullable();
			$table->date('fe_ente_fin')->nullable();
			$table->integer('id_banco_ente')->nullable();
			$table->string('tx_descripcion', 200)->nullable();
			$table->decimal('mo_pago', 12)->nullable();
			$table->string('tx_swift', 30)->nullable();
			$table->string('tx_observaciones', 500)->nullable();
			$table->integer('id_oferta_com')->nullable();
			$table->string('co_pago', 50)->nullable();
			$table->integer('id_tipo_pago')->nullable();
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
		Schema::drop('siscorp.tr_pago_div');
	}

}
