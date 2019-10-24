<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAdministracion.tgParametrosArchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('administracion.tg_parametros_arch', function(Blueprint $table)
		{
			$table->foreign('id_moneda_banco', 'fk_tg_parametros_arch_tg_moneda_banco')->references('id_moneda_banco')->on('administracion.tg_moneda_banco')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_tipo_archivo', 'fk_tg_parametros_arch_tg_tipo_archivo')->references('id_tipo_archivo')->on('administracion.tg_tipo_archivo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('administracion.tg_parametros_arch', function(Blueprint $table)
		{
			$table->dropForeign('fk_tg_parametros_arch_tg_moneda_banco');
			$table->dropForeign('fk_tg_parametros_arch_tg_tipo_archivo');
		});
	}

}
