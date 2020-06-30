<?php

use Illuminate\Database\Seeder;

class FormaPagamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\FormaPagamento::create([
            'id'            => '1',
            'forma_pagamento'   => 'Boleto',
        ]);

        App\Models\FormaPagamento::create([
            'id'            => '2',
            'forma_pagamento'   => 'Cartão de Crédido',
        ]);
    }
}
