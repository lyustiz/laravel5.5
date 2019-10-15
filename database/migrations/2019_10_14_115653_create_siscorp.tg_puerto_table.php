<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiscorp.tgPuertoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tg_puerto', function(Blueprint $table)
		{
			$table->integer('id_puerto', true);
			$table->string('nb_puerto', 100)->nullable();
			$table->string('tx_ciudad')->nullable();
			$table->string('co_01', 20)->nullable();
			$table->string('co_02', 20)->nullable();
			$table->integer('id_pais');
			$table->integer('id_tipo_puerto');
			$table->boolean('bo_carga')->nullable();
			$table->boolean('bo_descarga')->nullable();
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
		Schema::drop('siscorp.tg_puerto');
	}

}
