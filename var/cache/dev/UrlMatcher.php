<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
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
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/api/v1/(?'
                    .'|customers/(?'
                        .'|(\\d+)/cart(*:203)'
                        .'|(\\d+)/cart/(\\d+)(*:227)'
                        .'|(\\d+)/cart(*:245)'
                    .')'
                    .'|products/(?'
                        .'|(\\d+)(*:271)'
                        .'|delete/(\\d+)(*:291)'
                    .')'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        203 => [[['_route' => 'cart_show', '_controller' => 'App\\Controller\\CartController:indexAction'], ['id'], ['GET' => 0], null, false, false, null]],
        227 => [[['_route' => 'cart_delete', '_controller' => 'App\\Controller\\CartController:deleteAction'], ['customerId', 'cartId'], ['DELETE' => 0], null, false, true, null]],
        245 => [[['_route' => 'cart_update', '_controller' => 'App\\Controller\\CartController:actionUpdate'], ['customerId'], ['PUT' => 0], null, false, false, null]],
        271 => [[['_route' => 'product_update', '_controller' => 'App\\Controller\\ProductController:actionUpdate'], ['productId'], ['PATCH' => 0], null, false, true, null]],
        291 => [
            [['_route' => 'product_delete', '_controller' => 'App\\Controller\\ProductController:deleteAction'], ['productId'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
