<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorrespondenciaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('correspondencia.tr_correspondencia', function(Blueprint $table)
		{
			$table->integer('id_correspondencia', true);
			$table->string('nb_asunto');
			$table->string('tx_descripcion');
			$table->date('fe_comunicacion');
			$table->string('co_ncomunicacion', 50)->unique('UniN_comunicacion');
			$table->integer('id_empresa')->index('fki_tr_correspondencia_tg_empresa');
			$table->integer('id_empresa_div')->index('fki_tr_correspondencia_tg_empresa_div');
			$table->date('fe_recepcion');
			$table->string('tx_observacion')->nullable();
			$table->integer('id_tipo_correspondencia')->index('fki_tr_correspondencia_tg_tipo_correspondencia');
			$table->integer('id_status')->index('fki_tr_correspondencia_tg_status');
			$table->dateTime('fe_creado');
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_usuario');
			$table->integer('id_correspondencia_padre');
			$table->string('tx_departamento_sol')->nullable()->comment('Departamento Solicitante');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('correspondencia.tr_correspondencia');
	}

}
