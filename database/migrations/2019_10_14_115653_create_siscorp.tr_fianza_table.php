<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFianzaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_fianza', function(Blueprint $table)
		{
			$table->integer('id_fianza', true);
			$table->integer('id_tipo_fianza')->nullable();
			$table->integer('id_contrato')->nullable();
			$table->integer('id_aseguradora')->nullable();
			$table->string('co_fianza', 30)->nullable();
			$table->date('fe_entrega')->nullable();
			$table->date('fe_desde')->nullable();
			$table->date('fe_hasta')->nullable();
			$table->string('tx_observaciones', 500)->nullable();
			$table->date('fe_liberacion')->nullable();
			$table->decimal('mo_fianza', 12)->nullable();
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
		Schema::drop('siscorp.tr_fianza');
	}

}
