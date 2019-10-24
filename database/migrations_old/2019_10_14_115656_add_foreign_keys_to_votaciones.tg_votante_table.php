<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVotaciones.tgVotanteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('votaciones.tg_votante', function(Blueprint $table)
		{
			$table->foreign('id_estado', 'tg_votante_fk_tg_estado')->references('id_estado')->on('votaciones.tg_estado')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('votaciones.tg_votante', function(Blueprint $table)
		{
			$table->dropForeign('tg_votante_fk_tg_estado');
		});
	}

}
