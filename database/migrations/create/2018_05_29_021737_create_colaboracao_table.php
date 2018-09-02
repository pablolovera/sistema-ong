<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboracaoTable extends Migration {

	public function up()
	{
		Schema::create('colaboracao', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('empresa_id');
			$table->unsignedInteger('tipo_colaboracao_id');
			$table->longText('mensagem');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('colaboracao');
	}
}