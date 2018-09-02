<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsuarioPerfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuario_perfil', function (Blueprint $table) {
            $table->foreign('usuario_id')->references('id')->on('usuario');
            $table->foreign('perfil_id')->references('id')->on('perfil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuario_perfil', function (Blueprint $table) {
            $table->dropForeign('usuario_perfil_usuario_id_foreign');
            $table->dropForeign('usuario_perfil_perfil_id_foreign');
        });
    }
}
