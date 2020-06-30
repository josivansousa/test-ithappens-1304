<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToItensPedidoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('itens_pedido', function(Blueprint $table)
		{
			$table->foreign('produto_id', 'fk_itens_pedido_produtos1')->references('id')->on('produtos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('status_item_id', 'fk_itens_pedido_status_item1')->references('id')->on('status_item')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('pedido_estoque_id', 'fk_pedido_has_produtos_pedido1')->references('id')->on('pedidos_estoque')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('itens_pedido', function(Blueprint $table)
		{
			$table->dropForeign('fk_itens_pedido_produtos1');
			$table->dropForeign('fk_itens_pedido_status_item1');
			$table->dropForeign('fk_pedido_has_produtos_pedido1');
		});
	}

}
