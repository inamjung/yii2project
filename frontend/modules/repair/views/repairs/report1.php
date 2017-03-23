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
    ],
    'exportConfig' => [
        GridView::EXCEL => [],
        GridView::PDF => []
    ],
]);
?>
    

