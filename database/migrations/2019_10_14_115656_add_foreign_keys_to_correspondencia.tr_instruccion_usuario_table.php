<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCorrespondencia.trInstruccionUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('correspondencia.tr_instruccion_usuario', function(Blueprint $table)
		{
			$table->foreign('id_status', 'fk_tr_instruccion_usuario_tg_status')->references('id_status')->on('rp_corpovex.tg_status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_instruccion', 'fk_tr_instruccion_usuario_tr_instruccion')->references('id_instruccion')->on('correspondencia.tr_instruccion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('correspondencia.tr_instruccion_usuario', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_instruccion_usuario_tg_status');
			$table->dropForeign('fk_tr_instruccion_usuario_tr_instruccion');
		});
	}

}
