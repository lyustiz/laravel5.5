<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipoContenedorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tg_tipo_contenedor', function(Blueprint $table)
		{
			$table->integer('id_tipo_contenedor', true);
			$table->string('nb_tipo_contenedor')->nullable();
			$table->string('co_tipocont', 4)->nullable();
			$table->string('tx_descripcion', 1000)->nullable();
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
		Schema::drop('siscorp.tg_tipo_contenedor');
	}

}
