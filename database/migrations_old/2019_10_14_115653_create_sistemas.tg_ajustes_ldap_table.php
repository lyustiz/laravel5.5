<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSistemas.tgAjustesLdapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sistemas.tg_ajustes_ldap', function(Blueprint $table)
		{
			$table->integer('id_ajuste_ldap', true);
			$table->string('nb_servidor', 200)->nullable();
			$table->string('tx_ip_servidor', 100);
			$table->string('tx_usuario', 150);
			$table->string('tx_clave', 200);
			$table->integer('nu_puerto');
			$table->integer('nu_puerto_seguro')->nullable();
			$table->string('tx_base_arbol', 200);
			$table->integer('id_estatus')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sistemas.tg_ajustes_ldap');
	}

}
