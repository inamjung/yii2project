<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
//use yii\helpers\ArrayHelper;

use miloschuman\highcharts\Highcharts;

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
    //'showPageSummary' => true,
    'panel' => [
        'type' => GridView::TYPE_SUCCESS,
        'heading' => 'จำนวนซ่อมตามแผนก'
    ],
    'exportConfig' => [
        GridView::EXCEL => [],
        GridView::PDF => []
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
          [
              'type'=> 'column',
               'data'=>$total,
               'dataLabels'=> [
                    'enabled'=>true
                ]
          ]
         
      ]
   ]
]);?>
