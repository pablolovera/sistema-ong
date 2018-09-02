<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animal', function (Blueprint $table) {
            $table->foreign('empresa_id')->references('id')->on('empresa');
            $table->foreign('raca_id')->references('id')->on('raca');
            $table->foreign('pessoa_id')->references('id')->on('pessoa');
            $table->foreign('lar_temporario_id')->references('id')->on('lar_temporario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animal', function (Blueprint $table) {
            $table->dropForeign('animal_empresa_id_foreign');
            $table->dropForeign('animal_raca_id_foreign');
            $table->dropForeign('animal_pessoa_id_foreign');
            $table->dropForeign('animal_lar_temporario_id_foreign');
        });
    }
}
