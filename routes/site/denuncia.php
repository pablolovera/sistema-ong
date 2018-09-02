<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 19/06/18
 * Time: 01:00
 */

$router->group(['prefix' => 'denuncias'], function () use ($router) {

    $router->get('')
        ->uses('DenunciaController@index')
        ->name('site.denuncia.index');

    $router->post('')
        ->uses('DenunciaController@index')
        ->name('site.denuncia.search');
});
