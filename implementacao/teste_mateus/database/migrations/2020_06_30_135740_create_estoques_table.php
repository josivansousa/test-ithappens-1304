<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstoquesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estoques', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('filial_id')->index('fk_estoques_filiais1_idx');
			$table->integer('qtd_total');
			$table->string('valor_unitario', 45);
			$table->integer('produto_id')->index('fk_estoques_produtos1_idx');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estoques');
	}

}
