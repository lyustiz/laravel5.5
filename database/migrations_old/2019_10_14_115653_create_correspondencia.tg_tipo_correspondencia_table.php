<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipoCorrespondenciaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('correspondencia.tg_tipo_correspondencia', function(Blueprint $table)
		{
			$table->integer('id_tipo_correspondencia', true);
			$table->string('nb_tipo_correspondencia')->nullable();
			$table->integer('id_status')->index('fki_tg_tipo_correspondencia_tg_status')->comment('1= Activo; 2 = Inactivo. ');
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
		Schema::drop('correspondencia.tg_tipo_correspondencia');
	}

}
