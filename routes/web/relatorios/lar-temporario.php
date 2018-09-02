<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 19/06/18
 * Time: 01:00
 */

$router->group(['prefix' => 'lares-temporarios'], function () use ($router) {

    $router->get('')
        ->uses('LarTemporarioController@index')
        ->name('relatorios.lar-temporario.index');

    $router->post('')
        ->uses('LarTemporarioController@index')
        ->name('relatorios.lar-temporario.search');
});
