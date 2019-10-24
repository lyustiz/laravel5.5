<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSistemas.tgMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sistemas.tg_menus', function(Blueprint $table)
		{
			$table->foreign('id_estatus', 'tg_menus_id_estatus_fkey')->references('id_estatus')->on('sistemas.tg_estatus')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_modulo', 'tg_menus_id_modulo_fkey')->references('id_modulo')->on('sistemas.tg_modulos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sistemas.tg_menus', function(Blueprint $table)
		{
			$table->dropForeign('tg_menus_id_estatus_fkey');
			$table->dropForeign('tg_menus_id_modulo_fkey');
		});
	}

}
