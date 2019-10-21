<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rp_corpovex.tg_status', function(Blueprint $table)
		{
			$table->integer('id_status')->primary('pk_tg_status');
			$table->string('nb_status', 100)->nullable();
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_usuario')->nullable();
			$table->string('in_grupo_status', 30)->nullable();
			$table->string('nb_grupo_status', 200)->nullable();
			$table->string('nb_status2', 100)->nullable();
			$table->smallInteger('nu_orden')->nullable();
			$table->smallInteger('nu_orden2')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rp_corpovex.tg_status');
	}

}
