<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CustomersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Customers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter'=>['class'=>'yii\i18n\Formatter','nullDisplay'=>'-'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'avatar',
                'format'=>'html',
                'value'=> function($model){
                    return Html::img('img/'.$model->avatar,['class'=>'img-reponsive','style'=>'width: 80px;']);
                }
            ],
            'name',
            [
                'attribute'=>'addr',
                'value'=> function($model){
                    return $model->addr.' '.$model->custmb->name.' '.$model->cusamp->name.' '.$model->cuschw->name.' '.$model->p;
                }
            ],
//            'addr',
//            't',
//            'a',
//             'c',
             'birthday',
             //'cid',
             //'p',
             'tel',
            // 'work',
            [
                'attribute'=> 'department_id',
                'value'=> 'cusdep.name'
            ], 
            [
                'attribute'=> 'position_id',
                'value'=> 'cuspos.name'
            ],
             //'group_id',            
             'interest',            
//             'fb',
//             'line',
//             'email:email',
//             'createdate',
//             'updatedate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
