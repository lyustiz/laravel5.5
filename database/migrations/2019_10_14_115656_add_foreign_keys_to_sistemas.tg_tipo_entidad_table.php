<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSistemas.tgTipoEntidadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sistemas.tg_tipo_entidad', function(Blueprint $table)
		{
			$table->foreign('id_estatus', 'tg_tipo_entidad_id_estatus_fkey')->references('id_estatus')->on('sistemas.tg_estatus')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sistemas.tg_tipo_entidad', function(Blueprint $table)
		{
			$table->dropForeign('tg_tipo_entidad_id_estatus_fkey');
		});
	}

}
