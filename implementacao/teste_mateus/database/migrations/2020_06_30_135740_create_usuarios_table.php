<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 55);
			$table->string('senha', 500)->nullable();
			$table->string('email', 45)->unique('email_UNIQUE');
			$table->timestamps();
			$table->integer('filial_id')->nullable()->index('fk_usuarios_filiais1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}
