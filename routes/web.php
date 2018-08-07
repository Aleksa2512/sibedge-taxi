<?php

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
$api = app()->make(Dingo\Api\Routing\Router::class);

$api->version('v1', ['namespace' => 'App\Http\Controllers\V1'], function ($api) {

    $api->post('/auth/login', [
        'uses' => 'Auth\AuthController@postLogin'
    ]);
    $api->group(['middleware' => 'api.auth'], function ($api) {
        $api->get('/auth/user', [
            'uses' => 'Auth\AuthController@getUser'
        ]);
        $api->patch('/auth/refresh', [
            'uses' => 'Auth\AuthController@patchRefresh'
        ]);
        $api->delete('/auth/invalidate', [
            'uses' => 'Auth\AuthController@deleteInvalidate'
        ]);
    });
    
    $api->get('init', 'Controller@init');
    $api->get('get-all-workers', 'Controller@getAllWorkers');

    $api->group(['prefix' => 'driver'], function () use ($api) {
        $api->get('get-not-orders', 'DriverController@getNotOrders');
        $api->get('get-orders/{count:[0-9]+}', 'DriverController@getOrders');
        $api->get('get-by-sorting-count-orders', 'DriverController@getBySortingOrders');

        $api->get('', 'DriverController@index');
        $api->get('create', 'DriverController@create');
        $api->post('', 'DriverController@store');
        $api->get('{id}/edit', 'DriverController@edit');
        $api->put('{id}', 'DriverController@update');
        $api->delete('{id}', 'DriverController@destroy');
    });

    $api->group(['prefix' => 'car'], function () use ($api) {
        $api->get('get-cars-by-count-between-drivers/{from:[0-9]+}/{to:[0-9]+}', 'CarController@getCarsByCountBetweenDrivers');

        $api->get('', 'CarController@index');
        $api->get('create', 'CarController@create');
        $api->post('', 'CarController@store');
        $api->get('{id}/edit', 'CarController@edit');
        $api->put('{id}', 'CarController@update');
        $api->delete('{id}', 'CarController@destroy');
    });

    $api->group(['prefix' => 'order'], function () use ($api) {
        $api->get('get-not-is-completed', 'OrderController@getNotIsCompleted');

        $api->get('', 'OrderController@index');
        $api->get('create', 'OrderController@create');
        $api->post('', 'OrderController@store');
        $api->get('{id}/edit', 'OrderController@edit');
        $api->put('{id}', 'OrderController@update');
        $api->delete('{id}', 'OrderController@destroy');
    });
});