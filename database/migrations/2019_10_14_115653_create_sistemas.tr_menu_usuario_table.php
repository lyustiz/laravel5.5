<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSistemas.trMenuUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sistemas.tr_menu_usuario', function(Blueprint $table)
		{
			$table->integer('id_menu_usuario', true);
			$table->integer('id_usuario')->nullable();
			$table->integer('id_menu')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sistemas.tr_menu_usuario');
	}

}
