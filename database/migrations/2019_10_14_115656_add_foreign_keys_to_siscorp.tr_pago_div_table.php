<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.trPagoDivTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tr_pago_div', function(Blueprint $table)
		{
			$table->foreign('id_banco_ente', 'fk_tr_pago_div_tg_banco')->references('id_banco')->on('siscorp.tg_banco')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_tipo_pago', 'fk_tr_pago_div_tg_tipo_pago')->references('id_tipo_pago')->on('siscorp.tg_tipo_pago')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_oferta_com', 'fk_tr_pago_div_tr_oferta_com')->references('id_oferta_com')->on('siscorp.tr_oferta_com')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tr_pago_div', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_pago_div_tg_banco');
			$table->dropForeign('fk_tr_pago_div_tg_tipo_pago');
			$table->dropForeign('fk_tr_pago_div_tr_oferta_com');
		});
	}

}
