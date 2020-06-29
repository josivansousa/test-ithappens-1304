<?php

use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\Models\Usuario::create([
            'nome'      => 'Josivan',
            'email'     => 'josivan@g.com',
            'filial_id' => 1,
            'senha'     => bcrypt('123')
        ]);

    }
}
