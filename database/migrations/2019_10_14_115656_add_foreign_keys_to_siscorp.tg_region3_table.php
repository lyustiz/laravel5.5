<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.tgRegion3Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tg_region3', function(Blueprint $table)
		{
			$table->foreign('id_region2', 'fk_tg_region3_tg_region2')->references('id_region2')->on('siscorp.tg_region2')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tg_region3', function(Blueprint $table)
		{
			$table->dropForeign('fk_tg_region3_tg_region2');
		});
	}

}
