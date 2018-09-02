<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLarTemporarioCapacidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lar_temporario_capacidade', function (Blueprint $table) {
            $table->foreign('lar_temporario_id')->references('id')->on('lar_temporario');
            $table->foreign('especie_id')->references('id')->on('especie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lar_temporario_capacidade', function (Blueprint $table) {
            $table->dropForeign('lar_temporario_capacidade_lar_temporario_id_foreign');
            $table->dropForeign('lar_temporario_capacidade_especie_id_foreign');
        });
    }
}
