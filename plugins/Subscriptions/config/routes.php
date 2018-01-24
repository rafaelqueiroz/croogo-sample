<?php
use Cake\Routing\RouteBuilder;
use Croogo\Core\Router;

Router::plugin('Subscriptions', ['path' => '/'], function (RouteBuilder $route) {
    $route->prefix('admin', function (RouteBuilder $route) {
        $route->scope('/subscriptions', [], function (RouteBuilder $route) {
            $route->fallbacks();
        });
    });
	
    Router::build($route, '/plans-and-prices', ['controller' => 'Subscriptions', 'action' => 'add']);
});
