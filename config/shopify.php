<?php

return [
    'store' => [
        'pass'       => env('SHOPIFY_PASS'),
        'store'      => env('SHOPIFY_STORE'),
        'secret'     => env('SHOPIFY_SECRET'),
        'userName'   => env('SHOPIFY_USERNAME'),
        'locationId' => env('SHOPIFY_LOCATION_ID')
    ]
];
