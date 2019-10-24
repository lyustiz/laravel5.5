<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.trSolicitudTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tr_solicitud', function(Blueprint $table)
		{
			$table->foreign('id_ori_rec', 'fk_tr_solicitud_tg_financiamiento')->references('id_financiamiento')->on('siscorp.tg_financiamiento')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tr_solicitud', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_solicitud_tg_financiamiento');
		});
	}

}
