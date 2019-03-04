<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        // Yii2-admin
        //Yii2-admin Configuration Backend
        'admin' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'dektrium\user\models\User',
                ],
            ],
        ],
        // Yii2-user
        'user' => [
            'class' => 'dektrium\user\Module',
            'mailer' => [
                'sender' => ['no-reply@gitc.am' => 'Sender name'], // or ['no-reply@myhost.com' => 'Sender name']
                'welcomeSubject' => 'Welcome',
                'confirmationSubject' => 'Confirmation',
                'reconfirmationSubject' => 'Email change',
                'recoverySubject' => 'Recovery',
            ],
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // Yii2-admin DbManager
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['admin', 'author'], // your define roles
        ],
        // Checked
        'checked' => [
            'class' => 'common\components\Checked'
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'http://gitc.am/frontend/web/',
        ],
        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'http://gitc.am',
        ],
        'urlManagerCommon' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'http://gitc.am'
        ],
//
    ],
];
