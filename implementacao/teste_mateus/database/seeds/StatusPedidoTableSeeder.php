<?php

use Illuminate\Database\Seeder;

class StatusPedidoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\StatusPedido::create([
            'id'            => '1',
            'status_pedido'   => 'Entrada',
        ]);

        App\Models\StatusPedido::create([
            'id'            => '2',
            'status_pedido'   => 'Saída',
        ]);
    }
}
