<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 19/06/18
 * Time: 01:00
 */

$router->group(['prefix' => 'animais'], function () use ($router) {

    $router->get('')
        ->uses('AnimalController@index')
        ->name('cadastros.animal.index');

    $router->get('datagrid')
        ->uses('AnimalController@datagrid')
        ->name('cadastros.animal.datagrid');

    $router->get('create')
        ->uses('AnimalController@create')
        ->name('cadastros.animal.create');

    $router->post('')
        ->uses('AnimalController@store')
        ->name('cadastros.animal.store');

    $router->get('{id}/edit')
        ->uses('AnimalController@edit')
        ->name('cadastros.animal.edit');

    $router->put('{id}')
        ->uses('AnimalController@update')
        ->name('cadastros.animal.update');

    $router->delete('{id}')
        ->uses('AnimalController@destroy')
        ->name('cadastros.animal.delete');
});
