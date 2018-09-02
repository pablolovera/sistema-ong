<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalVacinaTable extends Migration {

	public function up()
	{
		Schema::create('animal_vacina', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('empresa_id');
			$table->unsignedInteger('animal_id');
			$table->unsignedInteger('vacina_id');
			$table->integer('lembrete_proprietario')->default(0);
			$table->integer('aplicado')->default(0);
			$table->date('data_aplicado')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('animal_vacina');
	}
}