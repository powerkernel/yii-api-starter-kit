<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */


$common = require __DIR__ . '/common.php';
$params = array_merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$config = [
    'id' => 'app-api',
    'name' => $params['name'],
    'basePath' => dirname(__DIR__) . '/src/api',
    'vendorPath' => dirname(__DIR__) . '/vendor',
    'runtimePath' => dirname(__DIR__) . '/runtime',
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['configuration'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'logger' => $common['logger'],
    'components' => [
        'configuration' => ['__class' => 'api\bootstrap\Configuration'],
        'mongodb' => $common['components']['mongodb'],
        'mailer' => $common['components']['mailer'],
        'sns' => $common['components']['sns'],
        'cloudinary' => $common['components']['cloudinary'],
        'mutex' => $common['components']['mutex'],
        'i18n' => $common['components']['i18n'],
        'authManager' => $common['components']['authManager'],
        'authClientCollection' => $common['components']['authClientCollection'],
        'cache' => [
            '__class' => yii\caching\Cache::class,
            'handler' => [
                '__class' => yii\caching\FileCache::class,
                'keyPrefix' => 'app-api',
            ],
        ],
        'request' => [
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            '__class' => yii\web\Response::class,
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                $response->setHeader('Access-Control-Allow-Origin', '*');
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
            'identityClass' => 'powerkernel\yiiuser\models\User',
            'enableAutoLogin' => false,
            'enableSession' => false,
            'loginUrl' => null,
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
