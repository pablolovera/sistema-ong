<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColaboracaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('colaboracao', function (Blueprint $table) {
            $table->foreign('empresa_id')->references('id')->on('empresa');
            $table->foreign('tipo_colaboracao_id')->references('id')->on('tipo_colaboracao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('colaboracao', function (Blueprint $table) {
            $table->dropForeign('colaboracao_empresa_id_foreign');
            $table->dropForeign('colaboracao_tipo_colaboracao_id_foreign');
        });
    }
}
