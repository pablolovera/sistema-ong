<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 19/06/18
 * Time: 01:00
 */

$router->group(['prefix' => 'pessoas'], function () use ($router) {

    $router->get('')
        ->uses('PessoaController@index')
        ->name('cadastros.pessoa.index');

    $router->get('datagrid')
        ->uses('PessoaController@datagrid')
        ->name('cadastros.pessoa.datagrid');

    $router->get('create')
        ->uses('PessoaController@create')
        ->name('cadastros.pessoa.create');

    $router->post('')
        ->uses('PessoaController@store')
        ->name('cadastros.pessoa.store');

    $router->get('{id}/edit')
        ->uses('PessoaController@edit')
        ->name('cadastros.pessoa.edit');

    $router->put('{id}')
        ->uses('PessoaController@update')
        ->name('cadastros.pessoa.update');

    $router->delete('{id}')
        ->uses('PessoaController@destroy')
        ->name('cadastros.pessoa.delete');
});
