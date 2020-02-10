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

$router->group(['namespace' => 'ArtishUp\Shopify\Order\Presentation\Http\Controller'], function() use ($router) {
    $router->get('orders/{orderId}', 'FindOrderController');
});


