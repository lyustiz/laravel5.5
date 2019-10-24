<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSistemas.tgSistemasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sistemas.tg_sistemas', function(Blueprint $table)
		{
			$table->integer('id_sistema', true);
			$table->string('nb_sistema', 300);
			$table->string('tx_acronimo_sistema', 200);
			$table->string('tx_descripcion', 500)->nullable();
			$table->integer('id_estatus')->nullable();
			$table->string('tx_icono', 200)->nullable();
			$table->integer('nu_orden')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sistemas.tg_sistemas');
	}

}
