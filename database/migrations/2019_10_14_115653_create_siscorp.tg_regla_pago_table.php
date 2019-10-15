<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiscorp.tgReglaPagoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tg_regla_pago', function(Blueprint $table)
		{
			$table->integer('id_regla_pago', true);
			$table->string('nb_regla_pago', 30)->nullable();
			$table->string('tx_descripcion', 200)->nullable();
			$table->decimal('pc_anticipo', 12)->nullable();
			$table->decimal('pc_bl', 12)->nullable();
			$table->decimal('pc_inspeccion', 12)->nullable();
			$table->boolean('bo_ofi_exp_mot')->nullable();
			$table->string('tx_dest_oficio', 100)->nullable();
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
		Schema::drop('siscorp.tg_regla_pago');
	}

}
