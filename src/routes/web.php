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


$router->group(['prefix' => 'api/'], function ($router){
    //USER
    $router->get('login/', 'UserController@authenticate');
    $router->post('register/', 'UserController@register');
    //TO-DO
    $router->post('todo/', 'ToDoController@store'); //WORK
    $router->get('todo/', 'ToDoController@index');
    $router->get('todo/{id}/', 'ToDoController@show');
    $router->put('todo/{id}', 'ToDoController@update');
    $router->delete('todo/{id}/', 'ToDoController@destroy');
});


//$router->routeMiddleware(
//    [
//        'auth' => App\Http\Middleware\Authenticate::class,
//    ]
//);

