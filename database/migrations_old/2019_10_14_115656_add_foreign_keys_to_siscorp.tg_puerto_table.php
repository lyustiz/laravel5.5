<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.tgPuertoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tg_puerto', function(Blueprint $table)
		{
			$table->foreign('id_tipo_puerto', 'fk_tg_puerto_tg_tipo_puerto')->references('id_tipo_puerto')->on('siscorp.tg_tipo_puerto')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tg_puerto', function(Blueprint $table)
		{
			$table->dropForeign('fk_tg_puerto_tg_tipo_puerto');
		});
	}

}
