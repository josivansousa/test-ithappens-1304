<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePedidosEstoqueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos_estoque', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('observacao', 500)->nullable();
			$table->integer('user_id')->index('fk_pedido_users1_idx');
			$table->integer('filial_id')->index('fk_pedido_filiais1_idx');
			$table->integer('cliente_id')->index('fk_pedido_estoque_clientes1_idx');
			$table->integer('forma_pagamento_id')->index('fk_pedidos_estoque_formas_pagamento1_idx');
			$table->integer('status_pedido_id')->index('fk_pedidos_estoque_status_pedido1_idx');
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
		Schema::drop('pedidos_estoque');
	}

}
