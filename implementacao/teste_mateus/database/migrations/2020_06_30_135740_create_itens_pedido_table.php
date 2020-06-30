<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItensPedidoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('itens_pedido', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('pedido_estoque_id')->index('fk_pedido_has_produtos_pedido1_idx');
			$table->integer('qtd');
			$table->decimal('valor_unitario', 10);
			$table->integer('produto_id')->index('fk_itens_pedido_produtos1_idx');
			$table->integer('status_item_id')->index('fk_itens_pedido_status_item1_idx');
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
		Schema::drop('itens_pedido');
	}

}
