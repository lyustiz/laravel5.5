<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tg_producto', function(Blueprint $table)
		{
			$table->integer('id_producto', true);
			$table->string('nb_producto')->nullable();
			$table->integer('id_u_medida');
			$table->integer('id_tipo_producto');
			$table->integer('id_cod_arancelario')->nullable();
			$table->string('tx_desc_tecnica', 500)->nullable();
			$table->string('tx_marca', 50)->nullable();
			$table->integer('id_status');
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_usuario');
			$table->text('tx_ruta')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('siscorp.tg_producto');
	}

}
