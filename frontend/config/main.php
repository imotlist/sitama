<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'controllerMap' => [
        'export' => 'phpnt\exportFile\controllers\ExportController'
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
            'errorAction' => 'site/error',
        ],
        //url manager
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '/' => 'site/index',
                'login' => 'site/login',
                'logout' => 'site/logout',
                'signup' => 'site/signup',
                'cari' => 'site/cari',
                'request-password-reset' => 'site/request-password-reset',

                //katalog
                '<alias:katalog>/<id:\w+>' => 'site/<alias>',
                '<controller:\w+>/<id:\w+>' => '<controller>',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\w+>/<tid:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                //artikel                
                '<alias:berita>/<id:\w+>' => 'site/<alias>',
                '<controller:\w+>/<id:\w+>' => '<controller>',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                
                //user                
                '<alias:user>/<id:\w+>' => 'site/<alias>',
                '<controller:\w+>/<id:\w+>' => '<controller>',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                

                //order                
                '<alias:order>/<id:\w+>' => 'site/<alias>',
                '<controller:\w+>/<id:\w+>' => '<controller>',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

                 //transaksi                
                '<alias:transaksi>/<id:\w+>' => 'site/<alias>',
                '<controller:\w+>/<id:\w+>' => '<controller>',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

                 //kategori            
                '<alias:kategori>/<id:\w+>' => 'site/<alias>',
                '<controller:\w+>/<id:\w+>' => '<controller>',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

                //kelompok           
                '<alias:kelompok>/<id:\w+>' => 'site/<alias>',
                '<controller:\w+>/<id:\w+>' => '<controller>',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

                //daerah          
                '<alias:daerah>/<id:\w+>' => 'site/<alias>',
                '<controller:\w+>/<id:\w+>' => '<controller>',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',



            ],
        ],
        //end url manager
        
    ],
    'params' => $params,
];
