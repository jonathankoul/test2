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

$router->group(['prefix' => 'api'], function () use ($router) {
    
  $router->get('login', ['uses' =>'LoginController@authenticate']);
  
  $router->get('users', ['uses' =>'UserController@showAllUsers']);
  $router->get('users/{id}', ['uses' =>'UserController@showOneUsers']);
  $router->post('users', ['uses' => 'UserController@createUsers']);
    
  $router->get('addressees',  ['uses' => 'AddresseeController@showAllAddressees']);
  $router->get('addressees/{id}', ['uses' => 'AddresseeController@showOneAddressees']);
  $router->post('addressees', ['uses' => 'AddresseeController@createAddressees']);
  $router->delete('addressees/{id}', ['uses' => 'AddresseeController@deleteAddressees']);
  $router->put('addressees/{id}', ['uses' => 'AddresseeController@updateAddressees']);
});