<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTalentoHumanoOld.tgUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('talento_humano_old.tg_usuario', function(Blueprint $table)
		{
			$table->text('id_usuario')->primary('tg_usuario_pkey');
			$table->string('nb_usuario', 30)->unique('tg_usuario_nb_usuario_unique');
			$table->string('tx_password', 50);
			$table->string('nb_nombre', 50);
			$table->string('nb_apellido', 50);
			$table->string('tx_correo', 50)->unique('tg_usuario_tx_correo_unique');
			$table->integer('id_status');
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('talento_humano_old.tg_usuario');
	}

}
