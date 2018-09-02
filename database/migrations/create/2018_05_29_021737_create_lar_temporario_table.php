<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLarTemporarioTable extends Migration {

	public function up()
	{
		Schema::create('lar_temporario', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('empresa_id');
			$table->unsignedInteger('pessoa_id');
			$table->string('nome');
			$table->bigInteger('cep')->nullable();
			$table->string('rua', 300)->nullable();
			$table->string('numero', 50)->nullable();
			$table->string('bairro')->nullable();
			$table->string('cidade')->nullable();
			$table->string('uf')->nullable();
			$table->string('complemento', 500)->nullable();
			$table->integer('status')->default(1);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('lar_temporario');
	}
}