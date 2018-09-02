<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLarTemporarioCapacidadeTable extends Migration {

	public function up()
	{
		Schema::create('lar_temporario_capacidade', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('lar_temporario_id');
			$table->unsignedInteger('especie_id');
			$table->integer('capacidade')->nullable();
			$table->integer('status')->default(1);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('lar_temporario_capacidade');
	}
}