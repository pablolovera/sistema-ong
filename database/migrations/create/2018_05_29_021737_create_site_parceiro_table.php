<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteParceiroTable extends Migration
{
	public function up()
	{
		Schema::create('site_parceiro', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('empresa_id');
			$table->string('nome');
			$table->string('endereco', 500)->nullable();
			$table->string('logo')->nullable();
			$table->string('site')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('site_parceiros');
	}
}