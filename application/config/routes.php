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

    'task/add' => [
        'controller'    => 'task',
        'action'        => 'add',
    ],

    'task/edit/{id:\d+}' => [
        'controller' => 'task',
        'action' => 'edit',
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