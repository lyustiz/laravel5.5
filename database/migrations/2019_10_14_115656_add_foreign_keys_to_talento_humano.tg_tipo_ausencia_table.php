<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTalentoHumano.tgTipoAusenciaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('talento_humano.tg_tipo_ausencia', function(Blueprint $table)
		{
			$table->foreign('id_status', 'tg_tipo_ausencia_id_status_foreign')->references('id_status')->on('talento_humano.tg_status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('talento_humano.tg_tipo_ausencia', function(Blueprint $table)
		{
			$table->dropForeign('tg_tipo_ausencia_id_status_foreign');
		});
	}

}
