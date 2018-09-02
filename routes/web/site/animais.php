<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 19/06/18
 * Time: 01:00
 */

$router->group(['prefix' => 'moderacao-animais'], function () use ($router) {

    $router->get('')
        ->uses('AnimalController@index')
        ->name('site.moderacao-animal.index');
});
