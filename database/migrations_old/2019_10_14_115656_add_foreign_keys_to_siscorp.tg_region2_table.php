<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.tgRegion2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tg_region2', function(Blueprint $table)
		{
			$table->foreign('id_region1', 'fk_tg_region2_tg_region1')->references('id_region1')->on('siscorp.tg_region1')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tg_region2', function(Blueprint $table)
		{
			$table->dropForeign('fk_tg_region2_tg_region1');
		});
	}

}
