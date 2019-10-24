<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVotaciones.tgUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('votaciones.tg_usuario', function(Blueprint $table)
		{
			$table->integer('id_usuario', true);
			$table->string('nb_usuario', 50);
			$table->string('tx_password', 32);
			$table->string('tx_correo', 50)->nullable();
			$table->integer('id_empleado')->nullable();
			$table->integer('id_tipo_usuario')->nullable();
			$table->integer('id_status')->nullable();
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_usuario_c')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('votaciones.tg_usuario');
	}

}
