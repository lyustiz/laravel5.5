<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTalentoHumanoOld.tgEmpleadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('talento_humano_old.tg_empleado', function(Blueprint $table)
		{
			$table->foreign('id_status', 'tg_empleado_id_status_foreign')->references('id_status')->on('talento_humano_old.tg_status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_tipo_empleado', 'tg_empleado_id_tipo_empleado_foreign')->references('id_tipo_empleado')->on('talento_humano_old.tg_tipo_empleado')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_ubicacion', 'tg_empleado_id_ubicacion_foreign')->references('id_ubicacion')->on('talento_humano_old.tg_ubicacion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('talento_humano_old.tg_empleado', function(Blueprint $table)
		{
			$table->dropForeign('tg_empleado_id_status_foreign');
			$table->dropForeign('tg_empleado_id_tipo_empleado_foreign');
			$table->dropForeign('tg_empleado_id_ubicacion_foreign');
		});
	}

}
