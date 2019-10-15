<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorrespondencia.trInstruccionUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('correspondencia.tr_instruccion_usuario', function(Blueprint $table)
		{
			$table->integer('id_instruccion_usuario')->default('correspondencia.tr_instruccion_usuario_id_instruccion_usuario_seq')->primary('pk_tr_correspondencia_usuario');
			$table->integer('id_instruccion')->index('fki_tr_correspondencia_usuario_tr_instruccion');
			$table->integer('nu_asignado')->comment('nu = porque es numerico
asignado= aquien se ke asif¿gno la correspondencia');
			$table->smallInteger('id_status')->index('fki_tr_correspondencia_usuario_tg_status')->comment('1 = Activo; 2 = Inactivo; de rp_corpovex.tg_status');
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_usuario')->comment('Quien hace el Insert o el ultimo Update');
			$table->unique(['id_instruccion','nu_asignado'], 'uk_tr_instruccion_id_instruccion_nu_asignado');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('correspondencia.tr_instruccion_usuario');
	}

}
