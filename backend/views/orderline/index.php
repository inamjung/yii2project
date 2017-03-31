<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderlineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orderlines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderline-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Orderline', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Order_id',
            'Order_hearder_id',
            'Order_No',
            'Line_No',
            // 'Item_No',
            // 'Description:ntext',
            // 'Get_Back',
            // 'Quantity',
            // 'Price',
            // 'Amout',
            // 'Deliver_Date',
            // 'Install',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
