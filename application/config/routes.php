<?php

return [
    '' => [
        'controller'    => 'common',
        'action'        => 'index',
    ],
    'common/index/{page:\d+}' => [
        'controller' => 'common',
        'action' => 'index',
    ],

    'task/index' => [
        'controller'    => 'task',
        'action'        => 'index',
    ],

    'task/index/{page:\d+}' => [
        'controller' => 'task',
        'action' => 'index',
    ],

    'task/sort/{sort:\d+}' => [
        'controller' => 'task',
        'action' => 'index',
    ],

    'task/add' => [
        'controller'    => 'task',
        'action'        => 'add',
    ],

    'task/edit/{id:\d+}' => [
        'controller' => 'task',
        'action' => 'edit',
    ],

    'task/delete/{id:\d+}' => [
        'controller' => 'task',
        'action' => 'delete',
    ],

    'account/login' => [
        'controller'    => 'account',
        'action'        => 'login',
    ],

    'account/logout' => [
        'controller'    => 'account',
        'action'        => 'logout',
    ],
];