<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilTable extends Migration {

	public function up()
	{
		Schema::create('perfil', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('empresa_id');
			$table->string('nome');
			$table->integer('status')->default(1);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('perfil');
	}
}