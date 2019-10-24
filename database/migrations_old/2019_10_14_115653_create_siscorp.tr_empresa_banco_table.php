<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpresaBancoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_empresa_banco', function(Blueprint $table)
		{
			$table->integer('id_empresa_banco', true);
			$table->integer('id_empresa')->nullable();
			$table->integer('id_banco')->nullable();
			$table->integer('id_moneda')->nullable();
			$table->string('tx_cuenta', 30)->nullable();
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
		Schema::drop('siscorp.tr_empresa_banco');
	}

}
