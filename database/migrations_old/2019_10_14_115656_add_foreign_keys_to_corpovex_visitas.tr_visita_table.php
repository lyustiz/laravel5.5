<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCorpovexVisitas.trVisitaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('corpovex_visitas.tr_visita', function(Blueprint $table)
		{
			$table->foreign('id_visitante', 'fk_tr_visita_tg_visitante_1')->references('id_visitante')->on('corpovex_visitas.tg_visitante')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('corpovex_visitas.tr_visita', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_visita_tg_visitante_1');
		});
	}

}
