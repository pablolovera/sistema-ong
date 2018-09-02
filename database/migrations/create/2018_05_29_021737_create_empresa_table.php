<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaTable extends Migration {

	public function up()
	{
		Schema::create('empresa', function(Blueprint $table) {
			$table->increments('id');
            $table->string('razao_social');
			$table->string('fantasia');
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
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('empresa');
	}
}