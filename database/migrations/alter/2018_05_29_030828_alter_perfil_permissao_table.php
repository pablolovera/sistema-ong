<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPerfilPermissaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perfil_permissao', function (Blueprint $table) {
            $table->foreign('perfil_id')->references('id')->on('perfil');
            $table->foreign('permissao_id')->references('id')->on('permissao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perfil_permissao', function (Blueprint $table) {
            $table->dropForeign('perfil_permissao_perfil_id_foreign');
            $table->dropForeign('perfil_permissao_permissao_id_foreign');
        });
    }
}
