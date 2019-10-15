<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCorrespondencia.trAccionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('correspondencia.tr_accion', function(Blueprint $table)
		{
			$table->foreign('id_instruccion_usuario', 'fk_tr_accion_tr_instruccion_usuario')->references('id_instruccion_usuario')->on('correspondencia.tr_instruccion_usuario')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_status', 'fk_tr_accion_tr_status')->references('id_status')->on('rp_corpovex.tg_status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('correspondencia.tr_accion', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_accion_tr_instruccion_usuario');
			$table->dropForeign('fk_tr_accion_tr_status');
		});
	}

}
