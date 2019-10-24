<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVotaciones.tgTipoEmpresaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('votaciones.tg_tipo_empresa', function(Blueprint $table)
		{
			$table->integer('id_tipo_empresa')->nullable();
			$table->string('nb_tipo_empresa')->nullable();
			$table->integer('id_status')->nullable();
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_usuario')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('votaciones.tg_tipo_empresa');
	}

}
