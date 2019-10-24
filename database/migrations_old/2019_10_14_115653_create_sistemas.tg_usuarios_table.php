<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSistemas.tgUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sistemas.tg_usuarios', function(Blueprint $table)
		{
			$table->integer('id_usuario', true);
			$table->string('nb_usuario', 200);
			$table->string('nb_primer_nombre', 150);
			$table->string('nb_segundo_nombre', 150)->nullable();
			$table->string('nb_primer_apellido', 150)->nullable();
			$table->string('nb_segundo_apellido', 150)->nullable();
			$table->string('tx_correo_contacto', 300);
			$table->string('tx_correo_contacto2', 300)->nullable();
			$table->string('tx_clave', 32);
			$table->integer('id_estatus')->nullable();
			$table->date('fe_creado');
			$table->string('tx_nacionalidad', 1)->nullable();
			$table->integer('nu_cedula')->nullable();
			$table->string('tx_rif', 12)->nullable();
			$table->string('tx_telefono_contacto', 100)->nullable();
			$table->string('tx_telefono_contacto2', 100)->nullable();
			$table->integer('id_tipo_entidad')->nullable();
			$table->integer('nu_visitas')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sistemas.tg_usuarios');
	}

}
