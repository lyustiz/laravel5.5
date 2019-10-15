<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTalentoHumanoOld.tgStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('talento_humano_old.tg_status', function(Blueprint $table)
		{
			$table->integer('id_status', true);
			$table->string('nb_status', 30);
			$table->string('tx_grupo', 15);
			$table->boolean('bo_activo');
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('talento_humano_old.tg_status');
	}

}
