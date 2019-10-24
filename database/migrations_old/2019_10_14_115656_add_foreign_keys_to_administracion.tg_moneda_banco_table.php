<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAdministracion.tgMonedaBancoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('administracion.tg_moneda_banco', function(Blueprint $table)
		{
			$table->foreign('id_banco', 'fk_tg_moneda_banco_tg_banco')->references('id_banco')->on('administracion.tg_banco')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_moneda', 'fk_tg_moneda_banco_tg_moneda')->references('id_moneda')->on('administracion.tg_moneda')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('administracion.tg_moneda_banco', function(Blueprint $table)
		{
			$table->dropForeign('fk_tg_moneda_banco_tg_banco');
			$table->dropForeign('fk_tg_moneda_banco_tg_moneda');
		});
	}

}
