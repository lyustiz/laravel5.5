<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrecioProductoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_precio_producto', function(Blueprint $table)
		{
			$table->integer('id_precio_producto', true);
			$table->integer('id_empresa_producto')->nullable();
			$table->decimal('mo_fob', 10, 0)->nullable();
			$table->decimal('mo_flete', 10, 0)->nullable();
			$table->decimal('mo_seguro', 10, 0)->nullable();
			$table->decimal('mo_cif', 10, 0)->nullable();
			$table->integer('id_moneda')->nullable();
			$table->integer('id_status');
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_usuario');
			$table->decimal('mo_exw', 10, 0)->nullable();
			$table->decimal('mo_fca', 10, 0)->nullable();
			$table->decimal('mo_cip', 10, 0)->nullable();
			$table->decimal('mo_dap', 10, 0)->nullable();
			$table->decimal('mo_ddp', 10, 0)->nullable();
			$table->string('tx_url', 100)->nullable()->comment('Url de referencia del precio de producto para ese momento');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('siscorp.tr_precio_producto');
	}

}
