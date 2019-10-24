<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVoluntarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gestion_comunicacional.tr_voluntario', function(Blueprint $table)
		{
			$table->integer('id_voluntario', true);
			$table->string('nb_nombres', 50)->nullable();
			$table->string('nb_apellidos', 50)->nullable();
			$table->integer('nu_cedula');
			$table->string('tx_sexo', 1)->nullable();
			$table->integer('ca_edad')->nullable();
			$table->string('tx_ubicacion', 100);
			$table->string('tx_celular', 12)->nullable();
			$table->integer('nu_extension')->nullable();
			$table->string('tx_correo', 30);
			$table->integer('id_estatus')->nullable();
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_usuario')->nullable();
			$table->boolean('bo_acepta_volunt')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gestion_comunicacional.tr_voluntario');
	}

}
