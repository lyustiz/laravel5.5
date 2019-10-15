<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVotaciones.trEmpleadoVotanteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('votaciones.tr_empleado_votante', function(Blueprint $table)
		{
			$table->foreign('id_empleado', 'tr_empleado_votante_fk_tg_empleado')->references('id_empleado')->on('votaciones.tg_empleado')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_votante', 'tr_empleado_votante_fk_tg_votante')->references('id_votante')->on('votaciones.tg_votante')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('votaciones.tr_empleado_votante', function(Blueprint $table)
		{
			$table->dropForeign('tr_empleado_votante_fk_tg_empleado');
			$table->dropForeign('tr_empleado_votante_fk_tg_votante');
		});
	}

}
