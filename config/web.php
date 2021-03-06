<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log',
                    'debug'],
    'defaultRoute' => 'home/index',
    'language' => 'ru',
    'name' => 'MyShop',
    'layout' => 'home',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'debug' => [ // панель на хостинге
            'class' => 'yii\debug\Module', //
            'allowedIPs' => ['*'] //
        ],
        'far' => [
            'class' => 'app\modules\far\Module',//подключили модуль админки
            'layout' => 'far',
            'defaultRoute' => 'home/index',
        ],
    ],
    'components' => [
//        'formatter' => [
//            'dateFormat' => 'php:d-F-Y | H:i',
//        ],
//        'assetManager' => [
//            'bundles' => [
//                'yii\web\JqueryAsset' => [
//                    'sourcePath' => null,   // не опубликовывать комплект
//                    'js' => [
//                        'js/jquery-3.5.1.min.js',
//                    ]
//                ],
//            ],
//        ],
//        'components' => [
//            'authManager' => [
//                'class' => 'yii\rbac\DbManager',
//            ],
//        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'kWvmSbridDnOOyyoWNFNicbn7mQxO9Gc',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => '/user/login',
        ],
        'errorHandler' => [
//            'errorAction' => 'site/error',
            'errorAction' => 'home/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mail.ru', //smtp.mail.ru, smtp.gmail.com
                'username' => 'gubskiyigor@mail.ru',// Ваш логин для выбранной почты
                'password' => 'ababkiu54849',//Ваш пароль для выбранной почты
                'port' => '465',//узнать можно гагуглив smtp.mail.ru настройки
                //например для mail.ru это 465 порт
                'encryption' => 'ssl',//тоже в настройках. Для mail.ru это ssl
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
//                'category/<category_id:\d+>/page/<page:\d+>' => 'category/view',
                'category/<category_id:\d+>' => 'category/view',
                'product/<id:\d+>' => 'product/view',
//                'search/page/<page:\d+>' => 'product/search',
                'search' => 'product/search',
//                'admin' => 'far/home/index'
            ],
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'path' => 'upload/files',
                'name' => 'Images'
            ],
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
