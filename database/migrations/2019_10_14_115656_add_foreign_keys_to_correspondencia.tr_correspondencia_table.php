<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCorrespondencia.trCorrespondenciaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('correspondencia.tr_correspondencia', function(Blueprint $table)
		{
			$table->foreign('id_empresa', 'fk_tr_correspondencia_tg_empresa')->references('id_empresa')->on('rp_corpovex.tg_empresa')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_tipo_correspondencia', 'fk_tr_correspondencia_tg_tipo_correspondencia')->references('id_tipo_correspondencia')->on('correspondencia.tg_tipo_correspondencia')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('correspondencia.tr_correspondencia', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_correspondencia_tg_empresa');
			$table->dropForeign('fk_tr_correspondencia_tg_tipo_correspondencia');
		});
	}

}
