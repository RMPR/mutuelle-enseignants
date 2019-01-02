<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'modules' => 
    [
        // Yii2 RBAC
        'rbac' => 'dektrium\rbac\RbacWebModule',
        'rbac' => 'dektrium\rbac\RbacConsoleModule',
        'user' => [
            'class' => 'dektrium\user\Module',
            // Yii2 User Controllers Overrides
            'controllerMap' => [
                'admin' => 'cinghie\userextended\controllers\AdminController',
                'security' => 'cinghie\userextended\controllers\SecurityController',
                'settings' => 'cinghie\userextended\controllers\SettingsController'
            ],
            // Yii2 User Models Overrides
            'modelMap' => [
                'RegistrationForm' => 'cinghie\userextended\models\RegistrationForm',
                'Profile' => 'cinghie\userextended\models\Profile',
                'SettingsForm' => 'cinghie\userextended\models\SettingsForm',
                'User' => 'cinghie\userextended\models\User',
            ],
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 216000,
            'cost' => 12,
            'admins' => ['admin']
        ],
        // Yii2 User Extended
        'userextended' => [
            'class' => 'cinghie\userextended\Module',
            'avatarPath' => '@webroot/img/users/', // Path to your avatar files
            'avatarURL' => '@web/img/users/', // Url to your avatar files
            'defaultRole' => '', // example 'registered'
            'avatar' => true,
            'bio' => false,
            'captcha' => true,
            'birthday' => true,
            'firstname' => true,
            'gravatarEmail' => false,
            'lastname' => true,
            'location' => false,
            'onlyEmail' => false,
            'publicEmail' => false,
            'signature' => true,
            //'templateLogin' => 'pmairo.polytechvalor@gmail.com', // login or login_prestashop
            //'templateLogoURL' => '@web/logo.png', // Url to logo
            //'templateRegister' => '_two_column', // _one_column or _two_column
            'terms' => true,
            'website' => false,
            'showTitles' => true, // Set false in adminLTE
        ],
    ],
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/rbac/views/permission' => '@vendor/cinghie/yii2-user-extended/views/permission',  
                    '@dektrium/rbac/views/role' => '@vendor/cinghie/yii2-user-extended/views/role',  
                    '@dektrium/rbac/views/rule' => '@vendor/cinghie/yii2-user-extended/views/rule',  
                    '@dektrium/user/views/admin' => '@vendor/cinghie/yii2-user-extended/views/admin',  
                    '@dektrium/user/views/profile' => '@vendor/cinghie/yii2-user-extended/views/profile',  
                    '@dektrium/user/views/role' => '@vendor/cinghie/yii2-user-extended/views/role',  
                    '@dektrium/user/views/security' => '@vendor/cinghie/yii2-user-extended/views/adminlte/security',  
                    '@dektrium/user/views/settings' => '@vendor/cinghie/yii2-user-extended/views/settings',  
                ],
            ],
        ],
        'urlManager' => [
            'showScriptName' => false,
            'enablePrettyUrl' => true
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'VcqVlNNT0fBwE770CCjojRsF5-vDrCzb',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
        ],*/
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'pmairo.polytechvalor@gmail.com',
                'password' => 'poly1971',
                'port' => '587',
                'encryption' => 'tls',
                'streamOptions' => [
                    'ssl' => [
                        'allow_self_signed'=> true,
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ],
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
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
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
