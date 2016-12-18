<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=yii',
            'username' => 'root',
            'password' => '123123',
            'charset' => 'utf8',
            'tablePrefix' => 'tsk_'
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            'cookieValidationKey' => 'MMgueDRAXdNLQiXk8w1a7VvG4bSbor-w',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => '',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,//这里是隐藏index.php那个路径的
            'suffix' => '.html',
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
            ]
        ],
    ],
    'params' => $params,
    'defaultRoute'=>'index'  //默认控制器
];
