<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.trFianzaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tr_fianza', function(Blueprint $table)
		{
			$table->foreign('id_tipo_fianza', 'fk_tr_fianza_tg_tipo_fianza')->references('id_tipo_fianza')->on('siscorp.tg_tipo_fianza')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_contrato', 'fk_tr_fianza_tr_contrato')->references('id_contrato')->on('siscorp.tr_contrato')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tr_fianza', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_fianza_tg_tipo_fianza');
			$table->dropForeign('fk_tr_fianza_tr_contrato');
		});
	}

}
