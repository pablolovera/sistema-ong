<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSobreNosTable extends Migration {

	public function up()
	{
		Schema::create('site_sobre_nos', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('empresa_id');
			$table->longText('historia')->nullable();
			$table->longText('missao')->nullable();
			$table->longText('visao')->nullable();
			$table->longText('valores')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('site_sobre_nos');
	}
}