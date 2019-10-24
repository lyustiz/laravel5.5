<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePtoCuentaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_pto_cuenta', function(Blueprint $table)
		{
			$table->integer('id_ptocta', true);
			$table->string('co_ptocta', 50)->nullable();
			$table->dateTime('fe_elaboracion')->nullable();
			$table->dateTime('fe_remision')->nullable();
			$table->dateTime('fe_recepcion_vp')->nullable();
			$table->dateTime('fe_decision')->nullable();
			$table->dateTime('fe_notificacion')->nullable();
			$table->integer('id_tipo_pto_cuenta')->nullable();
			$table->integer('co_decision')->nullable();
			$table->integer('id_solicitud')->nullable();
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
		Schema::drop('siscorp.tr_pto_cuenta');
	}

}
