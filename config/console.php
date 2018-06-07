<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

$common = require __DIR__ . '/common.php';
$params = array_merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$config = [
    'id' => 'app-console',
    'name' => $params['name'],
    'basePath' => dirname(__DIR__) . '/src/console',
    'vendorPath' => dirname(__DIR__) . '/vendor',
    'runtimePath' => dirname(__DIR__) . '/runtime',
    'controllerNamespace' => 'console\controllers',
    'bootstrap' => [],
    'controllerMap' => [
        'mongodb-migrate' => [
            '__class' => 'yii\mongodb\console\controllers\MigrateController',
        ],
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'logger' => $common['logger'],
    'components' => [
        'mongodb' => $common['components']['mongodb'],
        'mailer' => $common['components']['mailer'],
        'sns' => $common['components']['sns'],
        'mutex' => $common['components']['mutex'],
        'i18n' => $common['components']['i18n'],
        'authManager' => $common['components']['authManager'],

        'cache' => [
            '__class' => yii\caching\Cache::class,
            'handler' => [
                '__class' => yii\caching\FileCache::class,
                'keyPrefix' => 'app-console',
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
