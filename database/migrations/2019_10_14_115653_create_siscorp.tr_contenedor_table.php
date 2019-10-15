<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiscorp.trContenedorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_contenedor', function(Blueprint $table)
		{
			$table->integer('id_contenedor', true);
			$table->string('co_contenedor', 80)->nullable();
			$table->integer('id_bl');
			$table->integer('id_tipo_contenedor');
			$table->decimal('ca_cantidad', 12, 3)->nullable();
			$table->decimal('md_peso', 12, 3)->nullable();
			$table->string('co_sello', 50)->nullable();
			$table->integer('nu_dias');
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
		Schema::drop('siscorp.tr_contenedor');
	}

}
