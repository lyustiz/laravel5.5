<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSistemas.tgModulosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sistemas.tg_modulos', function(Blueprint $table)
		{
			$table->foreign('id_estatus', 'tg_modulos_id_estatus_fkey')->references('id_estatus')->on('sistemas.tg_estatus')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_sistema', 'tg_modulos_id_sistema_fkey')->references('id_sistema')->on('sistemas.tg_sistemas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sistemas.tg_modulos', function(Blueprint $table)
		{
			$table->dropForeign('tg_modulos_id_estatus_fkey');
			$table->dropForeign('tg_modulos_id_sistema_fkey');
		});
	}

}
