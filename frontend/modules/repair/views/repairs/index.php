<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\repair\models\RepairsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Repairs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repairs-index">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> แจ้งซ่อม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
  
    <div class="panel panel-success">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-list"></i>
             รายการส่งซ่อมของแผนก</div>
        <div class="panel-body">
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'satatus',
            'createDate',
            
            [
                'attribute'=>'department_id',
                'value'=>'repairdep.name'
            ],
            //'datenotuse',
            [
                'attribute'=>'tool_id',
                'value'=>'repairtool.name'
            ],            
            'problem:ntext',
            'stage',
            'answer',
            // 'startdate',
            
            // 'dateplan',
            // 'remark:ntext',
            
            // 'engineer_id',
            // 'enddate',
            // 'user_id',
            
            // 'updateDate',
            // 'approve',
            [
               'attribute' => 'พิมพ์',                                  
                'format' => 'raw',
                 'value' => function($data) {
                  $path = ('index.php?r=repair/repairs/report&id=' . $data->id);                                    
                  return Html::a('<i class="glyphicon glyphicon-print"> </i>', $path
                          ,['target' => '_blank', 'data-pjax' => 0, 'class' => 'btn btn-info btn-sm'
                          , 'title' => Yii::t('kvgrid', 'พิมพ์')]);
                   },
                       'contentOptions' => ['style' => 'width: 50px;text-align:center']
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update}{report}',
                'buttons'=>[
                    'update'=> function($url){
                        return Html::a('<i class="glyphicon glyphicon-edit"></i> แก้ไข',$url,['class'=>'btn btn-success']);
                    },
                    'report'=> function($url){
                        return Html::a('<i class="glyphicon glyphicon-print"></i> พิมพ์',$url,['class'=>'btn btn-warning']);
                    }
                ]
                ],
        ],
    ]); ?>
        </div>
    </div>
    
</div>
