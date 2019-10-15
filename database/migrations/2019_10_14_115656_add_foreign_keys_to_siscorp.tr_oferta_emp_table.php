<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.trOfertaEmpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tr_oferta_emp', function(Blueprint $table)
		{
			$table->foreign('id_incoterm', 'fk_tr_oferta_emp_tg_incoterm')->references('id_incoterm')->on('siscorp.tg_incoterm')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_moneda', 'fk_tr_oferta_emp_tg_moneda')->references('id_moneda')->on('siscorp.tg_moneda')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_regla_pago', 'fk_tr_oferta_emp_tg_regla_pago')->references('id_regla_pago')->on('siscorp.tg_regla_pago')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_tipo_trans_pago', 'fk_tr_oferta_emp_tg_tipo_trans_pago')->references('id_tipo_trans_pago')->on('siscorp.tg_tipo_trans_pago')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_oferta', 'fk_tr_oferta_emp_tr_oferta')->references('id_oferta')->on('siscorp.tr_oferta')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tr_oferta_emp', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_oferta_emp_tg_incoterm');
			$table->dropForeign('fk_tr_oferta_emp_tg_moneda');
			$table->dropForeign('fk_tr_oferta_emp_tg_regla_pago');
			$table->dropForeign('fk_tr_oferta_emp_tg_tipo_trans_pago');
			$table->dropForeign('fk_tr_oferta_emp_tr_oferta');
		});
	}

}
