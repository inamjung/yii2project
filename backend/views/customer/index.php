<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Customer_id',
            'Name',
            'Address:ntext',
            'Address2:ntext',
            'City:ntext',
            // 'Contact:ntext',
            // 'Mobile_No',
            // 'phone_No',
            // 'PostCode',
            // 'Email:email',
            // 'Country:ntext',
            // 'VAT_Registration_No',
            // 'duplicate_billing_adds:ntext',
            // 'BillingAddress:ntext',
            // 'BillingAddres2:ntext',
            // 'BillingAddressDistrict:ntext',
            // 'BillingAddressCity:ntext',
            // 'BillingPostCode:ntext',
            // 'duplicate_shipto_adds',
            // 'ShipToAddress:ntext',
            // 'ShiptoAddress2:ntext',
            // 'ShiptoDistrict:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
