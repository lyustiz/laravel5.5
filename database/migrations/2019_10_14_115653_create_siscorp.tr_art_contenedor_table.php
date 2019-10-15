<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiscorp.trArtContenedorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_art_contenedor', function(Blueprint $table)
		{
			$table->integer('id_art_contenedor', true);
			$table->integer('id_contenedor')->nullable();
			$table->integer('id_oferta_prod')->nullable();
			$table->decimal('ca_art_cont', 12, 3)->nullable();
			$table->decimal('ca_art_rec', 12, 3)->nullable();
			$table->string('tx_observaciones', 500)->nullable();
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
		Schema::drop('siscorp.tr_art_contenedor');
	}

}
