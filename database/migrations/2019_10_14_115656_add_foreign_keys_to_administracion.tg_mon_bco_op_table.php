<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAdministracion.tgMonBcoOpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('administracion.tg_mon_bco_op', function(Blueprint $table)
		{
			$table->foreign('id_moneda_banco', 'fk_tg_moneda_banco_op_tg_moneda_banco')->references('id_moneda_banco')->on('administracion.tg_moneda_banco')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('administracion.tg_mon_bco_op', function(Blueprint $table)
		{
			$table->dropForeign('fk_tg_moneda_banco_op_tg_moneda_banco');
		});
	}

}
