<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/asd' => [[['_route' => 'app_test_test', '_controller' => 'App\\Controller\\TestController::test'], null, null, null, false, false, null]],
        '/api/v1/customers' => [
            [['_route' => 'customer_list', '_controller' => 'App\\Controller\\CustomerController:indexAction'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'customer_create', '_controller' => 'App\\Controller\\CustomerController:createAction'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/v1/products' => [
            [['_route' => 'product_list', '_controller' => 'App\\Controller\\ProductController:indexAction'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'product_create', '_controller' => 'App\\Controller\\ProductController:createAction'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/v1/customers/cart' => [[['_route' => 'cart_create', '_controller' => 'App\\Controller\\CartController:createAction'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/v1/(?'
                    .'|customers/(?'
                        .'|(\\d+)/cart(*:41)'
                        .'|(\\d+)/cart/(\\d+)(*:64)'
                        .'|(\\d+)/cart(*:81)'
                    .')'
                    .'|products/(?'
                        .'|(\\d+)(*:106)'
                        .'|delete/(\\d+)(*:126)'
                    .')'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        41 => [[['_route' => 'cart_show', '_controller' => 'App\\Controller\\CartController:indexAction'], ['id'], ['GET' => 0], null, false, false, null]],
        64 => [[['_route' => 'cart_delete', '_controller' => 'App\\Controller\\CartController:deleteAction'], ['customerId', 'cartId'], ['DELETE' => 0], null, false, true, null]],
        81 => [[['_route' => 'cart_update', '_controller' => 'App\\Controller\\CartController:actionUpdate'], ['customerId'], ['PUT' => 0], null, false, false, null]],
        106 => [[['_route' => 'product_update', '_controller' => 'App\\Controller\\ProductController:actionUpdate'], ['productId'], ['PATCH' => 0], null, false, true, null]],
        126 => [
            [['_route' => 'product_delete', '_controller' => 'App\\Controller\\ProductController:deleteAction'], ['productId'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
