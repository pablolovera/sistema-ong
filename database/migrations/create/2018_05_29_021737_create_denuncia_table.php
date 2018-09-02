<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciaTable extends Migration {

	public function up()
	{
		Schema::create('denuncia', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('empresa_id');
			$table->unsignedInteger('usuario_id')->nullable();
			$table->longText('mensagem');
			$table->integer('status')->default(1);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('denuncia');
	}
}