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
    'id' => 'app-api',
    'basePath' => dirname(__DIR__) . '/src/api',
    'vendorPath' => dirname(__DIR__) . '/vendor',
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['configuration'],
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
        'configuration' => ['__class' => 'api\bootstrap\Configuration'],
        'cache' => [
            '__class' => yii\caching\Cache::class,
            'handler' => [
                '__class' => yii\caching\FileCache::class,
                'keyPrefix' => 'app-api',
            ],
        ],
        'mongodb' => $common['components']['mongodb'],
        'mailer' => $common['components']['mailer'],
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
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            '__class' => yii\web\Response::class,
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null && Yii::$app->request->get('suppress_response_code')) {
                    $response->data = [
                        'success' => $response->isSuccessful,
                        'data' => $response->data,
                    ];
                    $response->statusCode = 200;
                }
            }
        ],
        'assetManager' => [
            'appendTimestamp' => true,
        ],
        'session' => [
            '__class' => yii\web\Session::class
        ],
//        'errorHandler' => [
//            'errorAction' => 'site/error',
//        ],
        'urlManager' => [
            '__class' => yii\web\UrlManager::class,
            'enablePrettyUrl' => true,
            'showScriptName' => false,

        ],
        'user' => [
            'identityClass' => 'powerkernel\core\models\User',
            'enableAutoLogin' => false,
            'enableSession' => false,
            //'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
    ],
    'modules' => [
        'v1' => [
            '__class' => api\modules\v1\Module::class,
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
