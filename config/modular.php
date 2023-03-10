<?php
return [
    'path' => base_path() . '/app/Modules',
    'base_namespace' => 'App\Modules',
    'groupWithoutPrefix' => 'Pub',

    'groupMidleware' => [
        'Admin' => [
            'web' => ['auth'],
            'api' => ['auth:api'],
        ]
    ],

    'modules' => [
        'Admin' => [
            'TaskComment',
            'Task',
            'Analytics',
            'LeadComment',
            'Lead',
            'Sources',
            'Unit',
            'Status',
            'Role',
            'Menu',
            'Dashboard',
            'User'
        ],

        'Pub' => [
            'Auth'
        ],
    ]
];
