<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSiscorp.trOfertaProdTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('siscorp.tr_oferta_prod', function(Blueprint $table)
		{
			$table->foreign('id_cod_arancelario', 'fk_tr_oferta_prod_tg_cod_arancelario')->references('id_cod_arancelario')->on('siscorp.tg_cod_arancelario')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_tipo_producto', 'fk_tr_oferta_prod_tg_tipo_producto')->references('id_tipo_producto')->on('siscorp.tg_tipo_producto')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_u_medida', 'fk_tr_oferta_prod_tg_u_medida')->references('id_u_medida')->on('siscorp.tg_u_medida')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_oferta_emp', 'fk_tr_oferta_prod_tr_oferta_emp')->references('id_oferta_emp')->on('siscorp.tr_oferta_emp')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('siscorp.tr_oferta_prod', function(Blueprint $table)
		{
			$table->dropForeign('fk_tr_oferta_prod_tg_cod_arancelario');
			$table->dropForeign('fk_tr_oferta_prod_tg_tipo_producto');
			$table->dropForeign('fk_tr_oferta_prod_tg_u_medida');
			$table->dropForeign('fk_tr_oferta_prod_tr_oferta_emp');
		});
	}

}
