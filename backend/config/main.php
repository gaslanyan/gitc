<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name' => 'Accounting',
    //'homeUrl' => '/d-admin', // hosting config
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        // Configuration Yii2-user
        'user' => [
            'as backend' => 'dektrium\user\filters\BackendFilter',
            'controllers' => ['registration'], // not allowed controller in 'backend'
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['sysadmin'],
            // Override Model Yii2-user

            'modelMap' => [

                'Account' => 'backend\models\Account',

                'LoginForm' => 'backend\models\LoginForm',

                'Profile' => 'backend\models\Profile',

                'RecoveryForm' => 'backend\models\RecoveryForm',

                'RegistrationForm' => 'backend\models\RegistrationForm',

                'ResendForm' => 'backend\models\ResendForm',

                'SettingsForm' => 'backend\models\SettingsForm',

                'Token' => 'backend\models\Token',

                'User' => 'backend\models\User',

                'Person' => 'backend\models\Person',

                'UserSearch' => 'backend\models\UserSearch',

                'PersonSearch' => 'backend\models\PersonSearch',

            ],

            // Overide Controller Yii2-user

            'controllerMap' => [

                'profile' => 'backend\controllers\user\ProfileController',

                'recovery' => 'backend\controllers\user\RecoveryController',

                'registration' => 'backend\controllers\user\RegistrationController',

                'security' => 'backend\controllers\user\SecurityController',

                'settings' => 'backend\controllers\user\SettingsController',

                'admin' => 'backend\controllers\user\AdminController',


            ],


        ],

            'gridview' => [
                'class' => '\kartik\grid\Module',
                'downloadAction' => 'gridview/export/download',
            ],

        // End Configuration Yii2-user

        //Redactor Configuration

        'redactor' => [

            'class' => 'yii\redactor\RedactorModule',

            'uploadDir' => '@frontend/web/uploads',

            'uploadUrl' => 'http://gitc.am/backend/web/uploads',

            'imageAllowExtensions' => ['jpg', 'jpeg', 'png', 'gif']

        ],


        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['*'] // adjust this to your needs
        ],
    ],
    'components' => [

        // hosting config

        //'request' => [

        //   'baseUrl' => '/admin',

        // ],

        // hosting config

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'baseUrl' => 'http://gttkend.gitc.am',
            'showScriptName' => false,

        ],

        // Session on one domain yii2-user

//        'user' => [

//            'identityCookie' => [

//                'name' => '_backendIdentity',

//                'path' => '/',

//                'httpOnly' => true,

//            ],

//        ],

//        'session' => [

//            'name' => 'BACKENDSESSID',

//            'cookieParams' => [

//                'httpOnly' => true,

//                'path' => '/',

//            ],

//        ],

        // End session on one domain yii2-user

        // Overide view yii2-user

        'view' => [

            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user',
                ],

            ],

        ],

        // End overide view yii2-user

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

        'assetManager' => [

            'bundles' => [

                'dmstr\web\AdminLteAsset' => [

                    'skin' => 'skin-blue',

                ],

            ],

        ],

    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            //'admin/*',
            //'/user/admin/*',
//             'gii/*',
           'debug/*',
        ]
    ],
    'params' => $params,
    'aliases' => [

        '@urlFrontend' => 'http://1cms.local/frontend/web',

    ],
];

