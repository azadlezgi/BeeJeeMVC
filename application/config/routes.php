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

    'task/add' => [
        'controller'    => 'task',
        'action'        => 'add',
    ],

    'account/login' => [
        'controller'    => 'account',
        'action'        => 'login',
    ],

    'account/register' => [
        'controller'    => 'account',
        'action'        => 'register',
    ],
];