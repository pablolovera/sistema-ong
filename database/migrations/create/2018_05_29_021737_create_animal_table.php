<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalTable extends Migration {

	public function up()
	{
		Schema::create('animal', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('empresa_id');
			$table->unsignedInteger('raca_id');
			$table->unsignedInteger('pessoa_id')->nullable();
			$table->unsignedInteger('lar_temporario_id')->nullable();
			$table->string('nome');
			$table->date('data_nascimento')->nullable();
			$table->string('sexo', 100)->nullable();
			$table->float('peso')->nullable();
			$table->longText('temperamento')->nullable();
			$table->string('pelagem', 400)->nullable();
			$table->longText('observacao')->nullable();
			$table->string('foto')->nullable();
			$table->integer('eh_castrado')->default(0);
			$table->integer('publicado')->default(0);
			$table->longText('dados_adicionais')->nullable();
			$table->integer('status')->default(1);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('animal');
	}
}