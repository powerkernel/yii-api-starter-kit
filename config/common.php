<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

$secrets = require __DIR__ . '/secrets.php';
$config = [
    'components' => [
        'mongodb' => [
            '__class' => '\yii\mongodb\Connection',
            'dsn' => $secrets['db']['dsn'],
            'options' => $secrets['db']['options']
        ],
        'mailer' => [
            '__class' => yii\swiftmailer\Mailer::class,
            'useFileTransport' => $secrets['mailer']['useFileTransport'],
            'composer' => [
                '__class' => yii\mail\Composer::class,
                'htmlLayout' => '@vendor/powerkernel/yii-common/src/mail/layouts/html',
                'textLayout' => '@vendor/powerkernel/yii-common/src/mail/layouts/text'
            ],
            'transport' => [
                '__class' => 'Swift_SmtpTransport',
                'host' => $secrets['mailer']['transport']['host'],
                'username' => $secrets['mailer']['transport']['username'],
                'password' => $secrets['mailer']['transport']['password'],
                'port' => $secrets['mailer']['transport']['port'],
                'encryption' => $secrets['mailer']['transport']['encryption'],
            ],
        ],
        'sns' => [
            '__class' => powerkernel\sns\AwsSns::class,
            'key' => $secrets['awssns']['key'],
            'secret' => $secrets['awssns']['secret'],
            'region' => $secrets['awssns']['region'],
        ],
        'cache' => [
            '__class' => yii\caching\Cache::class,
            'handler' => [
                '__class' => yii\caching\FileCache::class,
                'keyPrefix' => 'app-api',
            ],
        ],
        'mutex' => [
            '__class' => yii\mutex\FileMutex::class
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    '__class' => yii\i18n\PhpMessageSource::class,
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\mongodb\rbac\MongoDbManager',
            'itemCollection'=>'core_auth_item',
            'ruleCollection'=>'core_auth_rule',
            'assignmentCollection'=>'core_auth_assignment',
            'defaultRoles'=>['member']
        ],
    ]
];

return $config;