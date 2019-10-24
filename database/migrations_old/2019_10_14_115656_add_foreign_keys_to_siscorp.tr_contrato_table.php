<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.trContratoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tr_contrato', function(Blueprint $table)
		{
			$table->foreign('id_regla_pago', 'fk_tr_contrato_tg_regla_pago')->references('id_regla_pago')->on('siscorp.tg_regla_pago')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_oferta_com', 'fk_tr_contrato_tr_oferta_com')->references('id_oferta_com')->on('siscorp.tr_oferta_com')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tr_contrato', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_contrato_tg_regla_pago');
			$table->dropForeign('fk_tr_contrato_tr_oferta_com');
		});
	}

}
