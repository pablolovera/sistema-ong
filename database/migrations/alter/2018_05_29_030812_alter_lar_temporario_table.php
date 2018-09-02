<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLarTemporarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lar_temporario', function (Blueprint $table) {
            $table->foreign('empresa_id')->references('id')->on('empresa');
            $table->foreign('pessoa_id')->references('id')->on('pessoa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lar_temporario', function (Blueprint $table) {
            $table->dropForeign('lar_temporario_empresa_id_foreign');
            $table->dropForeign('lar_temporario_pessoa_id_foreign');
        });
    }
}
