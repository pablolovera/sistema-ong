<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'v1', 'middleware' => 'client', 'namespace' => 'API'], function () {

    Route::resource('animal'                    , 'AnimalController')->except(['create', 'edit']);
    Route::resource('colaboracao'               , 'ColaboracaoController')->except(['create', 'edit']);
    Route::resource('contato'                   , 'ContatoController')->except(['create', 'edit']);
    Route::resource('denuncia'                  , 'DenunciaController')->except(['create', 'edit']);
    Route::resource('empresa'                   , 'EmpresaController')->except(['create', 'edit']);
    Route::resource('especie'                   , 'EspecieController')->except(['create', 'edit']);
    Route::resource('lar-temporario-capacidade' , 'LarTemporarioCapacidadeController')->except(['create', 'edit']);
    Route::resource('lar-temporario'            , 'LarTemporarioController')->except(['create', 'edit']);
    Route::resource('parceiro'                  , 'ParceirosController')->except(['create', 'edit']);
    Route::resource('perfil'                    , 'PerfilController')->except(['create', 'edit']);
    Route::resource('pessoa'                    , 'PessoaController')->except(['create', 'edit']);
    Route::resource('raca'                      , 'RacaController')->except(['create', 'edit']);
    Route::resource('sobre-nos'                 , 'SobreNosController')->except(['create', 'edit']);
    Route::resource('tipo-colaboracao'          , 'TipoColaboracaoController')->except(['create', 'edit']);
    Route::resource('tipo-usuario'              , 'TipoUsuarioController')->only(['index', 'show']);
    Route::resource('usuario'                   , 'UsuarioController')->except(['create', 'edit']);
    Route::resource('usuario-perfil'            , 'UsuarioPerfilController')->except(['create', 'edit']);
    Route::resource('vacina'                    , 'VacinaController')->except(['create', 'edit']);

});
