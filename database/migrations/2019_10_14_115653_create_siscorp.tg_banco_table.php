<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiscorp.tgBancoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tg_banco', function(Blueprint $table)
		{
			$table->integer('id_banco', true);
			$table->string('nb_banco')->nullable();
			$table->string('in_codigo', 5)->nullable();
			$table->string('tx_siglas', 20)->nullable();
			$table->string('tx_cod_swift', 11)->nullable();
			$table->string('incuenta', 30)->nullable();
			$table->integer('id_status');
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_usuario');
			$table->integer('id_pais_orig')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('siscorp.tg_banco');
	}

}
