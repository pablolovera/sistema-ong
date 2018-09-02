<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 19/06/18
 * Time: 01:00
 */

$router->group(['namespace' => 'Site'], function () use ($router) {

    require_once 'animais.php';
    require_once 'colaboracao.php';
    require_once 'contato.php';
    require_once 'denuncia.php';
    require_once 'parceiros.php';
    require_once 'sobre-nos.php';
});
