<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSistemas.tgMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sistemas.tg_menus', function(Blueprint $table)
		{
			$table->integer('id_menu', true);
			$table->integer('id_modulo')->nullable();
			$table->string('nb_menu', 300);
			$table->string('tx_descripcion', 500)->nullable();
			$table->integer('id_estatus')->nullable();
			$table->integer('nu_orden')->nullable();
			$table->string('tx_url_menu', 600)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sistemas.tg_menus');
	}

}
