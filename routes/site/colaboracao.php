<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 19/06/18
 * Time: 01:00
 */

$router->group(['prefix' => 'colaboracao'], function () use ($router) {

    $router->get('')
        ->uses('ColaboracaoController@index')
        ->name('site.colaboracao.index');

    $router->post('')
        ->uses('ColaboracaoController@index')
        ->name('site.colaboracao.search');
});
