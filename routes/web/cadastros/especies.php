<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 19/06/18
 * Time: 01:00
 */

$router->group(['prefix' => 'especies'], function () use ($router) {

    $router->get('')
        ->uses('EspecieController@index')
        ->name('cadastros.especie.index');

    $router->get('datagrid')
        ->uses('EspecieController@datagrid')
        ->name('cadastros.especie.datagrid');

    $router->get('create')
        ->uses('EspecieController@create')
        ->name('cadastros.especie.create');

    $router->post('')
        ->uses('EspecieController@store')
        ->name('cadastros.especie.store');

    $router->get('{id}/edit')
        ->uses('EspecieController@edit')
        ->name('cadastros.especie.edit');

    $router->put('{id}')
        ->uses('EspecieController@update')
        ->name('cadastros.especie.update');

    $router->delete('{id}')
        ->uses('EspecieController@delete')
        ->name('cadastros.especie.delete');
});
