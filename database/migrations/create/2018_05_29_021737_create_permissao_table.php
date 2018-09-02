<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissaoTable extends Migration {

	public function up()
	{
		Schema::create('permissao', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nome');
			$table->string('permissao', 300)->index();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('permissao');
	}
}