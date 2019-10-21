<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddendumTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_addendum', function(Blueprint $table)
		{
			$table->integer('id_addendum', true);
			$table->integer('id_contrato')->nullable();
			$table->string('co_addendum', 50)->nullable();
			$table->dateTime('fe_solicitud')->nullable();
			$table->string('tx_objeto', 500)->nullable();
			$table->dateTime('fe_firma')->nullable();
			$table->string('co_ptocta', 50)->nullable();
			$table->date('fe_ptocta')->nullable();
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
		Schema::drop('siscorp.tr_addendum');
	}

}
