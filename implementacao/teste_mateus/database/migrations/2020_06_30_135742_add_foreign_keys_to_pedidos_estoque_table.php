<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPedidosEstoqueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pedidos_estoque', function(Blueprint $table)
		{
			$table->foreign('cliente_id', 'fk_pedido_estoque_clientes1')->references('id')->on('clientes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('filial_id', 'fk_pedido_filiais1')->references('id')->on('filiais')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_pedido_users1')->references('id')->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('forma_pagamento_id', 'fk_pedidos_estoque_formas_pagamento1')->references('id')->on('formas_pagamento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('status_pedido_id', 'fk_pedidos_estoque_status_pedido1')->references('id')->on('status_pedido')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pedidos_estoque', function(Blueprint $table)
		{
			$table->dropForeign('fk_pedido_estoque_clientes1');
			$table->dropForeign('fk_pedido_filiais1');
			$table->dropForeign('fk_pedido_users1');
			$table->dropForeign('fk_pedidos_estoque_formas_pagamento1');
			$table->dropForeign('fk_pedidos_estoque_status_pedido1');
		});
	}

}
