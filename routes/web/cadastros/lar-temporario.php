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
        ->name('cadastros.lar-temporario.index');

    $router->get('datagrid')
        ->uses('LarTemporarioController@datagrid')
        ->name('cadastros.lar-temporario.datagrid');

    $router->get('create')
        ->uses('LarTemporarioController@create')
        ->name('cadastros.lar-temporario.create');

    $router->post('')
        ->uses('LarTemporarioController@store')
        ->name('cadastros.lar-temporario.store');

    $router->get('{id}/edit')
        ->uses('LarTemporarioController@edit')
        ->name('cadastros.lar-temporario.edit');

    $router->put('{id}')
        ->uses('LarTemporarioController@update')
        ->name('cadastros.lar-temporario.update');

    $router->delete('{id}')
        ->uses('LarTemporarioController@destroy')
        ->name('cadastros.lar-temporario.delete');
});
