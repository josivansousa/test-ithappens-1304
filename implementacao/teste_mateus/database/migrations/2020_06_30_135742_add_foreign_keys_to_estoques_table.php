<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEstoquesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('estoques', function(Blueprint $table)
		{
			$table->foreign('filial_id', 'fk_estoques_filiais1')->references('id')->on('filiais')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('produto_id', 'fk_estoques_produtos1')->references('id')->on('produtos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('estoques', function(Blueprint $table)
		{
			$table->dropForeign('fk_estoques_filiais1');
			$table->dropForeign('fk_estoques_produtos1');
		});
	}

}
