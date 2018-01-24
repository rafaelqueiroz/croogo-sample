<?php
namespace Subscriptions\Config;

use Croogo\Core\Nav;

Nav::add('sidebar', 'subscriptions', [
    'icon' => 'columns',
    'title' => __d('croogo', 'Subscriptions'),
    'url' => [
        'prefix' => 'admin',
        'plugin' => 'Subscriptions',
        'controller' => 'Subscriptions',
        'action' => 'index',
    ],
    'weight' => 30,
    'children' => [
        'subscriptions' => [
            'title' => __d('croogo', 'Subscriptions'),
            'url' => [
                'prefix' => 'admin',
                'plugin' => 'Subscriptions',
                'controller' => 'Subscriptions',
                'action' => 'index',
            ],
        ],
        'plans' => [
            'title' => __d('croogo', 'Plans'),
            'url' => [
                'prefix' => 'admin',
                'plugin' => 'Subscriptions',
                'controller' => 'Plans',
                'action' => 'index',
            ],
        ],
    ],
]);
