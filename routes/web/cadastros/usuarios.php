<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 19/06/18
 * Time: 01:00
 */

$router->group(['prefix' => 'usuarios'], function () use ($router) {

    $router->get('')
        ->uses('UsuarioController@index')
        ->name('cadastros.usuario.index');

    $router->get('datagrid')
        ->uses('UsuarioController@datagrid')
        ->name('cadastros.usuario.datagrid');

    $router->get('create')
        ->uses('UsuarioController@create')
        ->name('cadastros.usuario.create');

    $router->post('')
        ->uses('UsuarioController@store')
        ->name('cadastros.usuario.store');

    $router->get('{id}/edit')
        ->uses('UsuarioController@edit')
        ->name('cadastros.usuario.edit');

    $router->put('{id}')
        ->uses('UsuarioController@update')
        ->name('cadastros.usuario.update');

    $router->delete('{id}')
        ->uses('UsuarioController@destroy')
        ->name('cadastros.usuario.delete');
});
