<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.trPagoBsfTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tr_pago_bsf', function(Blueprint $table)
		{
			$table->foreign('id_banco_ente', 'fk_tr_pago_bsf_tg_banco')->references('id_banco')->on('siscorp.tg_banco')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_banco_corp', 'fk_tr_pago_bsf_tg_banco_1')->references('id_banco')->on('siscorp.tg_banco')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_oferta_com', 'fk_tr_pago_bsf_tr_oferta_com')->references('id_oferta_com')->on('siscorp.tr_oferta_com')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tr_pago_bsf', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_pago_bsf_tg_banco');
			$table->dropForeign('fk_tr_pago_bsf_tg_banco_1');
			$table->dropForeign('fk_tr_pago_bsf_tr_oferta_com');
		});
	}

}
