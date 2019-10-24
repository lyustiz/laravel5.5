<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tg_pais', function(Blueprint $table)
		{
			$table->integer('id_pais', true);
			$table->string('nb_pais', 100)->nullable();
			$table->string('co_pais', 3)->nullable()->unique('tg_pais_co_pais_key');
			$table->string('co_pais2', 3)->nullable()->unique('tg_pais_co_pais2_key');
			$table->integer('id_status');
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_usuario');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('siscorp.tg_pais');
	}

}
