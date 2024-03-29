<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVotaciones.tgEmpresaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('votaciones.tg_empresa', function(Blueprint $table)
		{
			$table->integer('id_empresa')->nullable();
			$table->string('nb_empresa')->nullable();
			$table->string('tx_rif', 15)->nullable();
			$table->string('tx_direccion', 512)->nullable();
			$table->string('tx_telefono', 100)->nullable();
			$table->string('tx_contacto', 80)->nullable();
			$table->string('tx_correo')->nullable();
			$table->integer('id_tipo_empresa')->nullable();
			$table->integer('id_pais')->nullable();
			$table->integer('id_region1')->nullable();
			$table->integer('id_region2')->nullable();
			$table->integer('id_region3')->nullable();
			$table->string('tx_localidad', 200)->nullable();
			$table->string('tx_telefono2', 100)->nullable();
			$table->string('id_ci_contacto', 14)->nullable();
			$table->string('tx_telefono_contacto', 100)->nullable();
			$table->string('tx_correo_contacto')->nullable();
			$table->integer('id_status')->nullable();
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_usuario')->nullable();
			$table->integer('co_id_padre')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('votaciones.tg_empresa');
	}

}
