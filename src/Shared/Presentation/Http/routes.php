<?php

/*
|--------------------------------------------------------------------------
| Shared Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['namespace' => 'ArtishUp\Shared\Presentation\Http\Controllers'], function() use ($router) {
    $router->get('/', 'AliveController@alive');
});


