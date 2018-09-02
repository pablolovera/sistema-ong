<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaTable extends Migration {

	public function up()
	{
		Schema::create('pessoa', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('empresa_id');
			$table->string('razao_social')->nullable();
			$table->string('nome');
			$table->bigInteger('cpf')->nullable();
			$table->bigInteger('cnpj')->nullable();
			$table->bigInteger('ie')->nullable();
			$table->bigInteger('im')->nullable();
            $table->bigInteger('cep')->nullable();
            $table->string('rua', 300)->nullable();
            $table->string('numero', 50)->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('complemento', 500)->nullable();
            $table->string('telefone_1', 20)->nullable();
            $table->string('telefone_2', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('sexo')->nullable();
			$table->longText('observacao')->nullable();
			$table->integer('status')->index()->default(1);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('pessoa');
	}
}