<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVotaciones.tgDependenciaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('votaciones.tg_dependencia', function(Blueprint $table)
		{
			$table->integer('id_dependencia', true);
			$table->string('nb_dependencia', 100)->nullable();
			$table->string('co_dependencia', 10)->nullable();
			$table->integer('nu_nivel')->nullable();
			$table->integer('id_padre')->nullable();
			$table->string('tx_telefono', 20)->nullable();
			$table->string('tx_observaciones', 200)->nullable();
			$table->integer('id_empresa')->nullable();
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
		Schema::drop('votaciones.tg_dependencia');
	}

}
