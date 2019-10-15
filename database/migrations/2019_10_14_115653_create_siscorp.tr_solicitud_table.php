<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiscorp.trSolicitudTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_solicitud', function(Blueprint $table)
		{
			$table->integer('id_solicitud', true);
			$table->string('co_solicitud', 100)->nullable();
			$table->dateTime('fe_solicitud')->nullable();
			$table->string('tx_descripcion')->nullable();
			$table->integer('id_empresa');
			$table->integer('id_ori_rec')->nullable();
			$table->integer('id_ente_ejec')->nullable();
			$table->dateTime('fe_envio_inst')->nullable();
			$table->integer('id_org_sol')->nullable();
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
		Schema::drop('siscorp.tr_solicitud');
	}

}
