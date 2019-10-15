<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiscorp.trBlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_bl', function(Blueprint $table)
		{
			$table->integer('id_bl', true);
			$table->integer('id_embarque')->nullable();
			$table->string('co_bl', 80)->nullable();
			$table->integer('id_tipo_puerto')->nullable();
			$table->integer('id_puerto_carg')->nullable();
			$table->integer('id_puerto_desc')->nullable();
			$table->string('nb_transporte', 80)->nullable();
			$table->string('co_viaje', 80)->nullable();
			$table->decimal('mo_bl_div', 12)->nullable();
			$table->string('tx_tipo', 20)->nullable();
			$table->integer('id_naviera')->nullable();
			$table->date('fe_embarque')->nullable();
			$table->date('fe_eta')->nullable();
			$table->date('fe_arribo')->nullable();
			$table->date('fe_fondeo')->nullable();
			$table->date('fe_asig_muelle')->nullable();
			$table->date('fe_atraque')->nullable();
			$table->date('fe_inspeccion')->nullable();
			$table->string('nu_acta', 80)->nullable();
			$table->date('fe_ini_descarga')->nullable();
			$table->date('fe_fin_descarga')->nullable();
			$table->date('fe_ini_despacho')->nullable();
			$table->date('fe_fin_despacho')->nullable();
			$table->date('fe_zarpe')->nullable();
			$table->integer('id_agente_aduanal')->nullable();
			$table->decimal('md_rata_descarga', 12)->nullable();
			$table->decimal('md_rata_ideal', 12)->nullable();
			$table->date('fe_insai')->nullable();
			$table->date('fe_insai_envio')->nullable();
			$table->string('tx_observaciones', 500)->nullable();
			$table->date('fe_recepcion_bl')->nullable();
			$table->integer('id_status')->nullable();
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
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
		Schema::drop('siscorp.tr_bl');
	}

}
