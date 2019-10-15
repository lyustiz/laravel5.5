<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTalentoHumanoOld.tgAusenciaEmpleadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('talento_humano_old.tg_ausencia_empleado', function(Blueprint $table)
		{
			$table->foreign('id_status', 'tg_ausencia_empleado_id_status_foreign')->references('id_status')->on('talento_humano_old.tg_status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_tipo_ausencia', 'tg_ausencia_empleado_id_tipo_ausencia_foreign')->references('id_tipo_ausencia')->on('talento_humano_old.tg_tipo_ausencia')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('talento_humano_old.tg_ausencia_empleado', function(Blueprint $table)
		{
			$table->dropForeign('tg_ausencia_empleado_id_status_foreign');
			$table->dropForeign('tg_ausencia_empleado_id_tipo_ausencia_foreign');
		});
	}

}
