<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipoEmpresaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tg_tipo_empresa', function(Blueprint $table)
		{
			$table->integer('id_tipo_empresa', true);
			$table->string('nb_tipo_empresa')->nullable();
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
		Schema::drop('siscorp.tg_tipo_empresa');
	}

}
