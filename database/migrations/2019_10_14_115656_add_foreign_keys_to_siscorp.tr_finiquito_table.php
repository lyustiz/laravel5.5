<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.trFiniquitoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tr_finiquito', function(Blueprint $table)
		{
			$table->foreign('id_contrato', 'fk_tr_finiquito_tr_contrato')->references('id_contrato')->on('siscorp.tr_contrato')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tr_finiquito', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_finiquito_tr_contrato');
		});
	}

}
