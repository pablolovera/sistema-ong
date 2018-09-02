<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 19/06/18
 * Time: 01:00
 */

$router->group(['prefix' => 'parceiros'], function () use ($router) {

    $router->get('')
        ->uses('ParceirosController@index')
        ->name('site.parceiro.index');

    $router->post('')
        ->uses('ParceirosController@index')
        ->name('site.parceiro.search');
});
