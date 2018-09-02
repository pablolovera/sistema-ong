<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteContatoTable extends Migration {

	public function up()
	{
		Schema::create('site_contato', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('empresa_id');
			$table->bigInteger('cep')->nullable();
			$table->string('rua')->nullable();
			$table->string('numero', 20)->nullable();
			$table->string('bairro')->nullable();
			$table->string('cidade')->nullable();
			$table->string('uf')->nullable();
			$table->string('complemento', 500)->nullable();
			$table->string('latitude', 30)->nullable();
			$table->string('longitude', 30)->nullable();
			$table->string('telefone_1', 20)->nullable();
			$table->string('telefone_2', 20)->nullable();
			$table->string('email')->nullable();
			$table->string('facebook')->nullable();
			$table->string('instagran')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('site_contato');
	}
}