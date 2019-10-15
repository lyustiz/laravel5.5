<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCorrespondencia.trInstruccionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('correspondencia.tr_instruccion', function(Blueprint $table)
		{
			$table->foreign('id_correspondencia', 'fk_tr_instruccion_tr_correspondencia')->references('id_correspondencia')->on('correspondencia.tr_correspondencia')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('correspondencia.tr_instruccion', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_instruccion_tr_correspondencia');
		});
	}

}
