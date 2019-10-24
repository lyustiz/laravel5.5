<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonedaBancoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('administracion.tg_moneda_banco', function(Blueprint $table)
		{
			$table->integer('id_moneda_banco', true);
			$table->integer('id_moneda')->nullable();
			$table->integer('id_banco')->nullable();
			$table->string('nu_cuenta', 25)->nullable();
			$table->string('tx_descripcion', 50)->nullable();
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
		Schema::drop('administracion.tg_moneda_banco');
	}

}
