<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfertaEmpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_oferta_emp', function(Blueprint $table)
		{
			$table->integer('id_oferta_emp', true);
			$table->integer('id_oferta')->nullable();
			$table->integer('id_empresa')->nullable();
			$table->date('fe_recepcion')->nullable();
			$table->date('fe_oferta_emp')->nullable();
			$table->boolean('bo_seleccionada')->nullable();
			$table->decimal('mo_divisas', 12)->nullable();
			$table->integer('id_moneda')->nullable();
			$table->integer('id_regla_pago');
			$table->integer('id_incoterm')->nullable();
			$table->integer('id_tipo_trans_pago')->nullable();
			$table->date('fe_acto_motivado')->nullable();
			$table->date('fe_notif_adjud')->nullable();
			$table->integer('nu_lotes')->nullable();
			$table->integer('id_tipo_puerto')->nullable();
			$table->integer('id_puerto_carg')->nullable();
			$table->integer('id_puerto_desc')->nullable();
			$table->integer('nu_contenedor')->nullable();
			$table->integer('id_tipo_contenedor')->nullable();
			$table->string('tx_observaciones', 500)->nullable();
			$table->integer('id_tipo_trans_pago1')->nullable();
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
		Schema::drop('siscorp.tr_oferta_emp');
	}

}
