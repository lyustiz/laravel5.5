<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.trContenedorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tr_contenedor', function(Blueprint $table)
		{
			$table->foreign('id_tipo_contenedor', 'fk_tr_contenedor_tg_tipo_contenedor')->references('id_tipo_contenedor')->on('siscorp.tg_tipo_contenedor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_bl', 'fk_tr_contenedor_tr_bl')->references('id_bl')->on('siscorp.tr_bl')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tr_contenedor', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_contenedor_tg_tipo_contenedor');
			$table->dropForeign('fk_tr_contenedor_tr_bl');
		});
	}

}
