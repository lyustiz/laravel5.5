<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacturaComTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_factura_com', function(Blueprint $table)
		{
			$table->integer('id_factura_com', true);
			$table->string('nu_factura_com', 40)->nullable();
			$table->date('fe_factura_com')->nullable();
			$table->integer('id_oferta_com')->nullable();
			$table->decimal('mo_fob_div', 12)->nullable();
			$table->decimal('mo_flete_div', 12)->nullable();
			$table->decimal('mo_seguro_div', 12)->nullable();
			$table->decimal('mo_total_div', 12)->nullable();
			$table->integer('id_incoterm')->nullable();
			$table->string('tx_observaciones', 500)->nullable();
			$table->integer('id_status');
			$table->dateTime('fe_creado')->nullable();
			$table->dateTime('fe_actualizado')->nullable();
			$table->integer('id_usuario');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('siscorp.tr_factura_com');
	}

}
