<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 19/06/18
 * Time: 01:00
 */

$router->group(['prefix' => 'contato'], function () use ($router) {

    $router->get('')
        ->uses('ContatoController@index')
        ->name('site.contato.index');

    $router->post('')
        ->uses('ContatoController@index')
        ->name('site.contato.search');
});
