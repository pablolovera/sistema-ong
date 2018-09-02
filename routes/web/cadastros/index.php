<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 19/06/18
 * Time: 01:00
 */

$router->group(['prefix' => 'cadastros', 'namespace' => 'WEB\\Cadastros'], function () use ($router) {

    require_once 'animais.php';
    require_once 'especies.php';
    require_once 'pessoas.php';
    require_once 'racas.php';
    require_once 'lar-temporario.php';
    require_once 'usuarios.php';
});
