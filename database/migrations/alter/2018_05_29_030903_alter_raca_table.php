<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRacaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('raca', function (Blueprint $table) {
            $table->foreign('empresa_id')->references('id')->on('empresa');
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
        Schema::table('raca', function (Blueprint $table) {
            $table->dropForeign('raca_empresa_id_foreign');
            $table->dropForeign('raca_especie_id_foreign');
        });
    }
}
