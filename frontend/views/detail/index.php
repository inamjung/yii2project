<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'main_id',
            'name',
            'qty',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
