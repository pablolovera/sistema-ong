<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 19/06/18
 * Time: 01:00
 */

$router->group(['prefix' => 'racas'], function () use ($router) {

    $router->get('')
        ->uses('RacaController@index')
        ->name('cadastros.raca.index');

    $router->get('datagrid')
        ->uses('RacaController@datagrid')
        ->name('cadastros.raca.datagrid');

    $router->get('list')
        ->uses('RacaController@listItens')
        ->name('cadastros.raca.list');

    $router->get('create')
        ->uses('RacaController@create')
        ->name('cadastros.raca.create');

    $router->post('')
        ->uses('RacaController@store')
        ->name('cadastros.raca.store');

    $router->get('{id}/edit')
        ->uses('RacaController@edit')
        ->name('cadastros.raca.edit');

    $router->put('{id}')
        ->uses('RacaController@update')
        ->name('cadastros.raca.update');

    $router->delete('{id}')
        ->uses('RacaController@delete')
        ->name('cadastros.raca.delete');
});
