<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfertaProdTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siscorp.tr_oferta_prod', function(Blueprint $table)
		{
			$table->integer('id_oferta_prod', true);
			$table->integer('id_oferta_emp');
			$table->integer('id_tipo_producto')->nullable();
			$table->string('nb_producto', 200)->nullable();
			$table->integer('id_u_medida')->nullable();
			$table->decimal('ca_cantidad', 12)->nullable();
			$table->decimal('mo_precio_unid_div', 12)->nullable();
			$table->decimal('mo_seguro_div', 12)->nullable();
			$table->decimal('mo_flete_div', 12)->nullable();
			$table->decimal('mo_total_cif_div', 12)->nullable();
			$table->integer('id_factura_com')->nullable();
			$table->integer('id_cod_arancelario')->nullable();
			$table->integer('id_subpart_arancelaria')->nullable();
			$table->integer('id_part_arancelaria')->nullable();
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
		Schema::drop('siscorp.tr_oferta_prod');
	}

}
