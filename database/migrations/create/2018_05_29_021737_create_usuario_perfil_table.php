<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioPerfilTable extends Migration {

	public function up()
	{
		Schema::create('usuario_perfil', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('usuario_id');
			$table->unsignedInteger('perfil_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('usuario_perfil');
	}
}