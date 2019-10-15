<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiscorp.tgNavieraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tg_naviera', function(Blueprint $table)
		{
			$table->integer('id_naviera', true);
			$table->string('nb_naviera', 100)->nullable();
			$table->string('tx_descripcion', 200)->nullable();
			$table->string('tx_telefono', 50)->nullable();
			$table->integer('id_pais');
			$table->string('tx_direccion', 200)->nullable();
			$table->string('tx_url', 200)->nullable();
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
		Schema::drop('siscorp.tg_naviera');
	}

}
