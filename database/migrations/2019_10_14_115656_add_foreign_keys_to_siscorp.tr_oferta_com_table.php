<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.trOfertaComTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tr_oferta_com', function(Blueprint $table)
		{
			$table->foreign('id_solicitud', 'fk_tr_oferta_com_tr_solicitud')->references('id_solicitud')->on('siscorp.tr_solicitud')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tr_oferta_com', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_oferta_com_tr_solicitud');
		});
	}

}
