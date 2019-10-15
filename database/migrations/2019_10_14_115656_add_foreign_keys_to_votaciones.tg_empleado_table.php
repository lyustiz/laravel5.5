<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVotaciones.tgEmpleadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('votaciones.tg_empleado', function(Blueprint $table)
		{
			$table->foreign('id_dependencia', 'tg_empleado_fk_tg_dependencia')->references('id_dependencia')->on('votaciones.tg_dependencia')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_estado', 'tg_empleado_fk_tg_estado')->references('id_estado')->on('votaciones.tg_estado')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('votaciones.tg_empleado', function(Blueprint $table)
		{
			$table->dropForeign('tg_empleado_fk_tg_dependencia');
			$table->dropForeign('tg_empleado_fk_tg_estado');
		});
	}

}
