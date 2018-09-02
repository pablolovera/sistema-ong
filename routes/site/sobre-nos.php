<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 19/06/18
 * Time: 01:00
 */

$router->group(['prefix' => 'sobre-nos'], function () use ($router) {

    $router->get('')
        ->uses('SobreNosController@index')
        ->name('site.sobre-nos.index');

    $router->post('')
        ->uses('SobreNosController@index')
        ->name('site.sobre-nos.search');
});
