<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSistemas.trMenuUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sistemas.tr_menu_usuario', function(Blueprint $table)
		{
			$table->foreign('id_menu', 'tr_menu_usuario_id_menu_fkey')->references('id_menu')->on('sistemas.tg_menus')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_usuario', 'tr_menu_usuario_id_usuario_fkey')->references('id_usuario')->on('sistemas.tg_usuarios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sistemas.tr_menu_usuario', function(Blueprint $table)
		{
			$table->dropForeign('tr_menu_usuario_id_menu_fkey');
			$table->dropForeign('tr_menu_usuario_id_usuario_fkey');
		});
	}

}
