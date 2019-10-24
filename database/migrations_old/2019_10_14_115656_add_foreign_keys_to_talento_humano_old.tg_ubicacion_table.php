<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTalentoHumanoOld.tgUbicacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('talento_humano_old.tg_ubicacion', function(Blueprint $table)
		{
			$table->foreign('id_status', 'tg_ubicacion_id_status_foreign')->references('id_status')->on('talento_humano_old.tg_status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('talento_humano_old.tg_ubicacion', function(Blueprint $table)
		{
			$table->dropForeign('tg_ubicacion_id_status_foreign');
		});
	}

}
