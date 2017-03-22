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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Repairs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
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
            // 'startdate',
            // 'satatus',
            // 'dateplan',
            // 'remark:ntext',
            // 'answer',
            // 'engineer_id',
            // 'enddate',
            // 'user_id',
            
            // 'updateDate',
            // 'approve',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
