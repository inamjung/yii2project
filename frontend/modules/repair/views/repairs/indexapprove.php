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
<!--
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Repairs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
    <div class="panel panel-danger">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-list"></i>
            ส่งซ่อมจากหน่วยงาน - รออนุมัติ-indexapprove</div>
        <div class="panel-body">
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    'satatus',
                    'createDate',
                    [
                        'attribute' => 'department_id',
                        'value' => 'repairdep.name'
                    ],
                    //'datenotuse',
                    [
                        'attribute' => 'tool_id',
                        'value' => 'repairtool.name'
                    ],
                    'problem:ntext',
                    'stage',
                    //'answer',
                    //'startdate',
                    // 'dateplan',
                    // 'remark:ntext',
                    // 'engineer_id',
                    // 'enddate',
                    // 'user_id',
                    // 'updateDate',
                    //'approve',
                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{updateboss}',
                        'buttons' => [
                            'updateboss' => function($url, $model) {
                                return Html::a('<i class="glyphicon glyphicon-pencil"></i> รับงาน', $url, ['class' => 'btn btn-danger']);
                            },
//                                    'view' => function($url, $model) {
//                                return Html::a('ดู', $url, ['class' => 'btn btn-primary']);
//                            }
                                ]
                            ],
                        ],
                    ]);
                    ?>
        </div>
    </div>
</div>
