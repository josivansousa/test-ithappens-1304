<?php

use Illuminate\Database\Seeder;

class StatusItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\StatusItem::create([
            'id'            => '1',
            'status_item'   => 'Ativo',
        ]);

        App\Models\StatusItem::create([
            'id'            => '2',
            'status_item'   => 'Processado',
        ]);
        App\Models\StatusItem::create([
            'id'            => '3',
            'status_item'   => 'Cancelado',
        ]);

    }
}
