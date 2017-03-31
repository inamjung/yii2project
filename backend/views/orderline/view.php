<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Orderline */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orderlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderline-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'Order_id',
            'Order_hearder_id',
            'Order_No',
            'Line_No',
            'Item_No',
            'Description:ntext',
            'Get_Back',
            'Quantity',
            'Price',
            'Amout',
            'Deliver_Date',
            'Install',
            'status',
        ],
    ]) ?>

</div>
