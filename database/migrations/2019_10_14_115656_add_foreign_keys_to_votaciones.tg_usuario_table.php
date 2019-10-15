<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVotaciones.tgUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('votaciones.tg_usuario', function(Blueprint $table)
		{
			$table->foreign('id_empleado', 'tg_usuario_fk_tg_empleado')->references('id_empleado')->on('votaciones.tg_empleado')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_tipo_usuario', 'tg_usuario_fk_tg_tipo_usuario')->references('id_tipo_usuario')->on('votaciones.tg_tipo_usuario')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('votaciones.tg_usuario', function(Blueprint $table)
		{
			$table->dropForeign('tg_usuario_fk_tg_empleado');
			$table->dropForeign('tg_usuario_fk_tg_tipo_usuario');
		});
	}

}
