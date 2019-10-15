<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTalentoHumano.tgUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('talento_humano.tg_usuario', function(Blueprint $table)
		{
			$table->foreign('id_status', 'tg_usuario_id_status_foreign')->references('id_status')->on('talento_humano.tg_status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('talento_humano.tg_usuario', function(Blueprint $table)
		{
			$table->dropForeign('tg_usuario_id_status_foreign');
		});
	}

}
