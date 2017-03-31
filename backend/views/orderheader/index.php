<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderheaderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orderheaders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderheader-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Orderheader', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Order_No',
            'Order_id',
            'Customer',
            'Salesperson_Code',
            // 'Salesperson_Name:ntext',
            // 'Store_No',
            // 'Event_Code',
            // 'Brand_Code',
            // 'Cash_and_Carry',
            // 'Delivery_Next_Day',
            // 'Partially_Ship',
            // 'Create_By_User_ID',
            // 'customer_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
