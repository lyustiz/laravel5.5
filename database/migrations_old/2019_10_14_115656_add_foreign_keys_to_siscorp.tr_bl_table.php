<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.trBlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tr_bl', function(Blueprint $table)
		{
			$table->foreign('id_tipo_puerto', 'fk_tr_bl_tg_puerto')->references('id_puerto')->on('siscorp.tg_puerto')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_embarque', 'fk_tr_bl_tr_embarque')->references('id_embarque')->on('siscorp.tr_embarque')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tr_bl', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_bl_tg_puerto');
			$table->dropForeign('fk_tr_bl_tr_embarque');
		});
	}

}
