<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$router = app('router');

//$router->get('/', function () {
//    return view('welcome');
//});

Auth::routes();

$router->get('/', function () use ($router) {
    return redirect()->route('dashboard.index');
});

$router->get('/home', function () use ($router) {
    return redirect()->route('dashboard.index');
});

$router->group(['middleware' => 'auth'], function () use ($router) {

    $router->get('dashboard')->uses('DashboardController@index')->name('dashboard.index');

    require_once 'web/index.php';
});

require_once 'site/index.php';

