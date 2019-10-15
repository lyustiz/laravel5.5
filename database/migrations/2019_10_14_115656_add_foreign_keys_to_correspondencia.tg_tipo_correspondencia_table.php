<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCorrespondencia.tgTipoCorrespondenciaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('correspondencia.tg_tipo_correspondencia', function(Blueprint $table)
		{
			$table->foreign('id_status', 'fk_tg_tipo_correspondencia_tg_status')->references('id_status')->on('rp_corpovex.tg_status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('correspondencia.tg_tipo_correspondencia', function(Blueprint $table)
		{
			$table->dropForeign('fk_tg_tipo_correspondencia_tg_status');
		});
	}

}
