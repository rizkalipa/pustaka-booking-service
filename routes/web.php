<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => '/buku'], function() use($router) {
    $router->get('/', 'ExampleController@getDataBuku');
    $router->get('/{id}', 'ExampleController@getDetailBuku');
    $router->post('/', 'ExampleController@insertDataBuku');
    $router->put('/{id}', 'ExampleController@updateDataBuku');
    $router->delete('/{id}', 'ExampleController@deleteDataBuku');
});


