<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAnimalVacinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animal_vacina', function (Blueprint $table) {
            $table->foreign('empresa_id')->references('id')->on('empresa');
            $table->foreign('animal_id')->references('id')->on('animal');
            $table->foreign('vacina_id')->references('id')->on('vacina');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animal_vacina', function (Blueprint $table) {
            $table->dropForeign('animal_vacina_empresa_id_foreign');
            $table->dropForeign('animal_vacina_animal_id_foreign');
            $table->dropForeign('animal_vacina_vacina_id_foreign');
        });
    }
}
