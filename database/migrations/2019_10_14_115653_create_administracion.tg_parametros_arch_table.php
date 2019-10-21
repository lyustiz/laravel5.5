<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParametrosArchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('administracion.tg_parametros_arch', function(Blueprint $table)
		{
			$table->integer('id_parametros_arch', true);
			$table->integer('id_moneda_banco')->nullable();
			$table->integer('id_tipo_archivo')->nullable();
			$table->string('nb_campo', 20)->nullable();
			$table->string('nu_inicio', 20)->nullable();
			$table->string('nu_longitud', 20)->nullable();
			$table->string('tx_tipo', 10)->nullable();
			$table->string('tx_formato', 20)->nullable();
			$table->integer('nu_orden')->nullable();
			$table->string('tx_omitir', 100)->nullable();
			$table->string('tx_extra', 20)->nullable();
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
		Schema::drop('administracion.tg_parametros_arch');
	}

}
