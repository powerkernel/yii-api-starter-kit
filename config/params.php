<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

return [
    'name' => 'My App',
    'languages' => [
        'en-US',
    ],
    'account'=>[
        'notification'=>[
            'admin'=>[
                'accountCreated'=>true,
                'accountDeleted'=>true
            ],
            'user'=>[
                'accountCreated'=>true,
                'accountDeleted'=>true
            ],
        ],
    ],
    'mailer' => [
        'from' => ['your-email@domain.com' => 'your name'],
    ],
    'organization' => [
        'legalName' => 'Power Kernel Inc',
        'address' => '', // String
        'social' => [
            'google' => [
                'url',
                'icon',
            ],
            'facebook' => [
                'url',
                'icon',
            ],
            // ...
        ],
        'adminEmail'=>'admin-email@domain.com',
    ],
    'logos' => [
        'email' => '', // URL
    ],
    'modules'=>[
        'v1'=>[
            'core' => [
                'class' => 'powerkernel\yiicore\v1\Module',
            ],
            'auth' => [
                'class' => 'powerkernel\yiiauth\v1\Module',
            ],
        ]
    ]
];
