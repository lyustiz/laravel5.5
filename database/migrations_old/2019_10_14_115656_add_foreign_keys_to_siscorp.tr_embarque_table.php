<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.trEmbarqueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tr_embarque', function(Blueprint $table)
		{
			$table->foreign('id_pais_orig', 'fk_tr_embarque_tg_pais')->references('id_pais')->on('siscorp.tg_pais')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_oferta_com', 'fk_tr_embarque_tr_oferta_com')->references('id_oferta_com')->on('siscorp.tr_oferta_com')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tr_embarque', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_embarque_tg_pais');
			$table->dropForeign('fk_tr_embarque_tr_oferta_com');
		});
	}

}
