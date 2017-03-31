<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Payment_id',
            'Order_No',
            'Line_No',
            'Payment_Method_Code',
            'Payment_Amount',
            // 'Card_No',
            // 'Card_Expire_Date',
            // 'Ref_No_1:ntext',
            // 'Ref_No_2:ntext',
            // 'Is_Credit_Card',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
