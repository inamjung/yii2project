<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Customer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Customer_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Customer_id',
            'Name',
            'Address:ntext',
            'Address2:ntext',
            'City:ntext',
            'Contact:ntext',
            'Mobile_No',
            'phone_No',
            'PostCode',
            'Email:email',
            'Country:ntext',
            'VAT_Registration_No',
            'duplicate_billing_adds:ntext',
            'BillingAddress:ntext',
            'BillingAddres2:ntext',
            'BillingAddressDistrict:ntext',
            'BillingAddressCity:ntext',
            'BillingPostCode:ntext',
            'duplicate_shipto_adds',
            'ShipToAddress:ntext',
            'ShiptoAddress2:ntext',
            'ShiptoDistrict:ntext',
        ],
    ]) ?>

</div>
