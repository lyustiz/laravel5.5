<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiscorp.trEmpresaProductoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_empresa_producto', function(Blueprint $table)
		{
			$table->integer('id_empresa_producto', true);
			$table->integer('id_empresa')->nullable();
			$table->integer('id_producto')->nullable();
			$table->integer('id_pais_origen')->nullable();
			$table->integer('id_status');
			$table->text('tx_observacion')->nullable();
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
		Schema::drop('siscorp.tr_empresa_producto');
	}

}
