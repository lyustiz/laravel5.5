<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSistemas.tgTipoEntidadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sistemas.tg_tipo_entidad', function(Blueprint $table)
		{
			$table->integer('id_tipo_entidad', true);
			$table->string('nb_tipo_entidad', 200);
			$table->integer('id_estatus')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sistemas.tg_tipo_entidad');
	}

}
