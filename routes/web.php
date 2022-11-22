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

$router->group(['prefix' => 'mahasiswas'], function () use ($router) {
    $router->post('/', ['uses' => 'MahasiswaController@createMahasiswa']);
    $router->get('/', ['uses' => 'MahasiswaController@getMahasiswas']);
    $router->get('/{nim}', ['uses' => 'MahasiswaController@getMahasiswaById']);
    $router->get('/{nim}/matakuliah/{mkId}', ['uses' => 'MahasiswaController@addMatakuliah']); //
});

$router->group(['prefix' => 'prodi'], function () use ($router) {
    $router->post('/', ['uses' => 'ProdiController@createProdi']);
});

$router->group(['prefix' => 'matakuliah'], function () use ($router) {
    $router->post('/', ['uses' => 'MatakuliahController@createMatakuliah']);
});
