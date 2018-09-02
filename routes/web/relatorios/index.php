<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 19/06/18
 * Time: 01:00
 */

$router->group(['prefix' => 'relatorios', 'namespace' => 'WEB\\Relatorios'], function () use ($router) {

    require_once 'animais.php';
    require_once 'lar-temporario.php';
});
