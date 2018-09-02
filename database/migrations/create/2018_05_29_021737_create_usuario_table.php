<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioTable extends Migration {

	public function up()
	{
		Schema::create('usuario', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('empresa_id');
			$table->unsignedInteger('tipo_usuario_id');
			$table->string('nome');
			$table->string('email')->unique();
			$table->string('password');
			$table->string('foto')->nullable();
            $table->string('cpf', 20)->nullable();
            $table->bigInteger('cep')->nullable();
            $table->string('rua', 300)->nullable();
            $table->string('numero', 50)->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('complemento', 500)->nullable();
            $table->string('telefone_1', 20)->nullable();
            $table->string('telefone_2', 20)->nullable();
			$table->integer('status')->default(1);
            $table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('usuario');
	}
}