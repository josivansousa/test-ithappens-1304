<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->integer('filial_id');
            $table->string('senha');
            $table->rememberToken();
            $table->timestamps();
        });

        App\Models\Usuario::create([
            'nome'      => 'Josivan',
            'email'     => 'josivan@gmail.com',
            'filial_id' => 1,
            'senha'     => bcrypt('123')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
