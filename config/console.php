<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'app-console',
    'name' => 'App Console',
    'basePath' => dirname(__DIR__) . '/src/console',
    'vendorPath' => dirname(__DIR__) . '/vendor',
    'bootstrap' => [],
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'mongodb-migrate' => [
            '__class' => 'yii\mongodb\console\controllers\MigrateController',
            'db' => 'db'
        ],
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'logger' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            [
                '__class' => yii\log\FileTarget::class,
                'levels' => ['error', 'warning'],
            ],
        ],
    ],
    'components' => [
        'cache' => [
            '__class' => yii\caching\Cache::class,
            'handler' => [
                '__class' => yii\caching\FileCache::class,
                'keyPrefix' => 'app-console',
            ],
        ],
        'mailer' => [
            '__class' => yii\swiftmailer\Mailer::class,
        ],
        'mutex' => [
            '__class' => yii\mutex\FileMutex::class
        ],
        'db' => $db,
        'i18n' => [
            'translations' => [
                '*' => [
                    '__class' => yii\i18n\PhpMessageSource::class,
                ],
            ],
        ],
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

if (YII_ENV == 'dev') {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
