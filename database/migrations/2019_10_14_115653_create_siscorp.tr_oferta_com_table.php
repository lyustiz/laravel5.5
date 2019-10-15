<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiscorp.trOfertaComTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_oferta_com', function(Blueprint $table)
		{
			$table->integer('id_oferta_com', true);
			$table->integer('id_solicitud')->nullable();
			$table->date('fe_reunion_log')->nullable();
			$table->decimal('mo_divisa', 12)->nullable();
			$table->string('tx_responsable_nac', 50)->nullable();
			$table->string('tx_lugar_entrega', 50)->nullable();
			$table->date('fe_ofcom_ente')->nullable();
			$table->string('co_oferta_com', 30)->nullable();
			$table->boolean('bo_acepta_ente')->nullable();
			$table->date('fe_acepta_ente')->nullable();
			$table->string('nb_nbape_resp', 50)->nullable();
			$table->string('tx_cargo_resp', 50)->nullable();
			$table->string('tx_tlf_resp', 30)->nullable();
			$table->string('tx_correo_resp', 30)->nullable();
			$table->decimal('mo_adquisicion', 12)->nullable();
			$table->decimal('mo_flete_int', 12)->nullable();
			$table->decimal('mo_flete_nac', 12)->nullable();
			$table->decimal('mo_imp_nac', 12)->nullable();
			$table->decimal('mo_gastos_oplog', 12)->nullable();
			$table->decimal('mo_serv_adqu', 12)->nullable();
			$table->decimal('mo_iva', 12)->nullable();
			$table->decimal('mo_total', 12)->nullable();
			$table->date('fe_recep_corp')->nullable();
			$table->string('tx_observaciones', 500)->nullable();
			$table->integer('id_oferta_emp')->nullable();
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
		Schema::drop('siscorp.tr_oferta_com');
	}

}
