<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update}',
                'buttons'=>[
                    'update'=> function($url){
                        return Html::a('<i class="glyphicon glyphicon-edit"></i> แก้ไข',$url,['class'=>'btn btn-success']);
                    }
                ]
                ],
        ],
    ]); ?>
        </div>
    </div>
    
</div>
