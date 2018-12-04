<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',

    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
            'menus' => [
                'assignment' => [
                    'label' => 'Grant Access' // change label
                ],
                //'route' => null, // disable menu
            ],
        ]  
    ],

    'components' => [

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],


    ],
];
?>