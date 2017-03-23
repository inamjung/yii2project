<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\export\ExportMenu;

use miloschuman\highcharts\Highcharts;

$datas = $dataProvider->getModels();
?>
<?php

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
        [
            'attribute'=>'dep',
        ],
        [
            'attribute'=>'total',
        ],
 
    ];
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
    'columns' => $gridColumns,
    'responsive' => true,
    'hover' => true,
    'striped' => false,
    'floatHeader' => FALSE,
    
    'panel' => [
        'type' => GridView::TYPE_SUCCESS,
        'heading' => 'จำนวนซ่อมตามแผนก'
    ],
    'toolbar' => [       
        '{export}',
        //'{toggleData}'
        'exportConfig '=> [
    ExportMenu::FORMAT_TEXT => false,
    ExportMenu::FORMAT_PDF => true
]
    ],
    
]);
?>
    
<?php echo Highcharts::widget([
   'options' => [
      'title' => ['text' => 'จำนวนซ่อมตามแผนก'],
      'xAxis' => [
         'categories' => $dep
      ],
      'yAxis' => [
         'title' => ['text' => 'จำนวน๖(รายการ)']
      ],
      'series' => [
         'type'=> 'column',
          'data'=>$total,
          'dataLabels'=> [
              'enabled'=>true
          ]
      ]
   ]
]);?>
