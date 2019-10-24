<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.trArtContenedorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tr_art_contenedor', function(Blueprint $table)
		{
			$table->foreign('id_contenedor', 'fk_tr_art_contenedor_tr_contenedor')->references('id_contenedor')->on('siscorp.tr_contenedor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tr_art_contenedor', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_art_contenedor_tr_contenedor');
		});
	}

}
