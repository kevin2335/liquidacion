<?php
use kartik\datecontrol\Module;
use kartik\widgets\DatePicker;

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '9xHm7QgK1jj2EqtAod65ItapoOv_54KC',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Usuarios',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'formatter' => [
            'dateFormat' => 'php:d/M/Y',
            'locale' => 'en-US',
            'timeZone' =>  'America/Puerto_Rico',
       ],
    ],
  'modules' => [
    'datecontrol' =>  [
        'class' => 'kartik\datecontrol\Module',
        'displaySettings' => [
            Module::FORMAT_DATE => 'php:d/M/Y',
            Module::FORMAT_TIME => 'php:h:i:s A',
            Module::FORMAT_DATETIME => 'php:d/M/Y h:i:s A',
        ],
        'saveSettings' => [
            Module::FORMAT_DATE => 'php:U', // saves as unix timestamp
            Module::FORMAT_TIME => 'php:U',
            Module::FORMAT_DATETIME => 'php:U',
        ],
        'displayTimezone' => $params['timezone'],
        'saveTimezone' => $params['timezone'],
        'autoWidget' => true,
        'ajaxConversion' => true,
        'autoWidgetSettings' => [
            Module::FORMAT_DATE => ['type' => 2, 'pluginOptions'=>['autoclose'=>true]], // example
            Module::FORMAT_DATETIME => [], // setup if needed
            Module::FORMAT_TIME => [], // setup if needed
        ],
        'widgetSettings' => [
            Module::FORMAT_DATE => [
                'class' => 'yii\jui\DatePicker', // example
                'options' => [
                    'dateFormat' => 'php:d-M-Y',
                    'options' => ['class'=>'form-control'],
                ]
            ]
        ]
    ],
 ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
