<?php
return [
    'id'=>'app-common',
    'language'=>'th_TH',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules'=>[
        'gridview'=>[
            'class'=>'\kartik\grid\Module'
        ]
    ]
];
