<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdministracion.tgTipoArchivoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('administracion.tg_tipo_archivo', function(Blueprint $table)
		{
			$table->integer('id_tipo_archivo', true);
			$table->string('nb_tipo_archivo', 20)->nullable();
			$table->string('tx_icono', 20)->nullable();
			$table->string('tx_accept', 120)->nullable();
			$table->integer('id_status')->nullable();
			$table->date('fe_creado')->nullable();
			$table->date('fe_actualizado')->nullable();
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
		Schema::drop('administracion.tg_tipo_archivo');
	}

}
