<?php

use \kartik\mpdf\Pdf;
use \yii\web\Request;

$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

$params = array_merge(

    require(__DIR__ . '/../../common/config/params.php'),

    require(__DIR__ . '/../../common/config/params-local.php'),

    require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')

);



return [

    'id' => 'app-frontend',
    'name' => 'gitc',
//    'homeUrl' => '/', // hosting config

    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'am',
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [

        // Yii2-user configuration frontend

        'user' => [

            // following line will restrict access to admin controller from frontend application

            'as frontend' => 'dektrium\user\filters\FrontendFilter',

            'modelMap' => [

                'Account' => 'frontend\models\Account',

                'LoginForm' => 'frontend\models\LoginForm',

                'Profile' => 'frontend\models\Profile',

                'RecoveryForm' => 'frontend\models\RecoveryForm',

                'RegistrationForm' => 'frontend\models\RegistrationForm',

                'ResendForm' => 'frontend\models\ResendForm',

                'SettingsForm' => 'frontend\models\SettingsForm',

                'Token' => 'frontend\models\Token',

                'User' => 'frontend\models\User',

            ],

            'controllerMap' => [

                'profile' => 'frontend\controllers\user\ProfileController',

                'recovery' => 'frontend\controllers\user\RecoveryController',

                'registration' => 'frontend\controllers\user\RegistrationController',

                'security' => 'frontend\controllers\user\SecurityController',

                'settings' => 'frontend\controllers\user\SettingsController',

            ],

        ],

    ],
    'components' => [
        'pdf' => [
            'class' => Pdf::className(),
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            // refer settings section for all configuration options
        ],

        // hosting config

       'request' => [
           'baseUrl' => $baseUrl,

      ],

        // hosting config

        'urlManager' => [

//            'class' => '\frontend\components\MyUrlManager',

            'class' => 'yii\web\UrlManager',

            'enablePrettyUrl' => true,

            'showScriptName' => false,

            'rules' => [

//                'site/page/<slug>' => 'site/page',

                'news/index' => 'news/index',

                'news/index/<slug>' => 'news/index',

                'projects/index' => 'projects',

                'projects/<slug>' => 'projects/view',

                'regions/index' => 'regions',

                'regions/<slug>' => 'regions/view',

                'training/index' => 'training/index',

                'training/<slug>' => 'training/view',

                '<controller:\w+>/<id:\d+>' => '<controller>/view',

                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',

                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

                '<alias:register>' => 'user/registration/<alias>',

                '<alias:logout|login>' => 'user/security/<alias>',







//                '<language:\w+>/<alias:register>' => 'user/registration/<alias>',

//                '<language:\w+>/<alias:logout|login>' => 'user/security/<alias>',

//

//                '<language:\w+>/<controller>/<action>/<id:\d+>/<title>' => '<controller>/<action>',

//                '<language:\w+>/<controller>/<id:\d+>/<title>' => '<controller>/index',

//                '<language:\w+>/<controller>/<action>/<id:\d+>' => '<controller>/<action>',

//                '<language:\w+>/<controller>/<action>' => '<controller>/<action>',

//                '<language:\w+>/<controller>' => '<controller>',

//                '<language:\w+>/'=>'site/index',

//                '<language:\w+>/site/<slug>' => 'site/page',





            ],

        ],



        'user' => [

            'identityCookie' => [

                'name' => '_frontendIdentity',

                'path' => 'http://1cms.local/',

                'httpOnly' => true,

            ],

        ],

        'session' => [

            'name' => 'FRONTENDSESSID',

            'cookieParams' => [

                'httpOnly' => true,

                'path' => 'http://1cms.local/',

            ],

        ],

        'view' => [

            'theme' => [

                'pathMap' => [

                    '@dektrium/user/views' => '@app/views/user',

                ],

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

        'errorHandler' => [

            'errorAction' => 'site/error',

        ],

//        'authClientCollection' => [

//            'class' => \yii\authclient\Collection::className(),

//            'clients' => [

//                'facebook' => [

//                    'class' => 'dektrium\user\clients\Facebook',

//                    'clientId' => '1547326xxxxxxxx', // clientId FB

//                    'clientSecret' => 'c6190dcd3f310xxxxxxxxxxx', //clientSecret FB

//                ],

//                'twitter' => [

//                    'class' => 'dektrium\user\clients\Twitter',

//                    'consumerKey' => '5HK13urUrYHSgAxxxxxxxxxxxx', // cunsumerKey twitter

//                    'consumerSecret' => 'thl4zLXiBASdewsQUFCCRBavhfYipEP3SeFxxxxxxxxx', // consumer secret twitter

//                ],

//                'google' => [

//                    'class' => 'dektrium\user\clients\Google',

//                    'clientId' => '80130023845-8l37uxxxxxxxxxxxxx.apps.googleusercontent.com',

//                    'clientSecret' => 'xxxxxxxxxxxxR8-kQfThyA',

//                ],

//            ],

//        ],

    ],
    'as beforeRequest' => [

        'class' => '\frontend\components\CheckLang'

    ],
    'params' => $params,
];



