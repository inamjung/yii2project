<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use frontend\models\DetailSearch;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MainSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mains';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Main', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value'=> function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;                    
                },
                'detail'=> function($model, $key, $index, $column){
                    $searchModel = new DetailSearch();
                    $searchModel ->main_id = $model->id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    
                    return Yii::$app->controller->renderPartial('_detail',[
                        'searchModel'=> $searchModel,
                        'dataProvider'=> $dataProvider,
                    ]);
                 }
                ],

            //'id',
            'date',
            'maindep.name',
            //'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
