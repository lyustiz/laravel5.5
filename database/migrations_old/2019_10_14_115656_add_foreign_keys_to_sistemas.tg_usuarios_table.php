<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSistemas.tgUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sistemas.tg_usuarios', function(Blueprint $table)
		{
			$table->foreign('id_estatus', 'tg_usuarios_id_estatus_fkey')->references('id_estatus')->on('sistemas.tg_estatus')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_tipo_entidad', 'tg_usuarios_id_tipo_entidad_fkey')->references('id_tipo_entidad')->on('sistemas.tg_tipo_entidad')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sistemas.tg_usuarios', function(Blueprint $table)
		{
			$table->dropForeign('tg_usuarios_id_estatus_fkey');
			$table->dropForeign('tg_usuarios_id_tipo_entidad_fkey');
		});
	}

}
