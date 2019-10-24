<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCodArancelarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tg_cod_arancelario', function(Blueprint $table)
		{
			$table->integer('id_cod_arancelario', true);
			$table->string('nb_cod_arancelario')->nullable();
			$table->string('co_01', 30)->nullable();
			$table->string('co_02', 30)->nullable();
			$table->integer('nu_nivel');
			$table->integer('id_cod_padre')->nullable();
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
		Schema::drop('siscorp.tg_cod_arancelario');
	}

}
