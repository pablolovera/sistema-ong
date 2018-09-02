<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilPermissaoTable extends Migration {

	public function up()
	{
		Schema::create('perfil_permissao', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('perfil_id');
			$table->unsignedInteger('permissao_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('perfil_permissao');
	}
}