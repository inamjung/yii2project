<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use kartik\grid\GridView;
use backend\models\Orderline;

/* @var $this yii\web\View */
/* @var $model backend\models\Orderheader */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orderheaders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderheader-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?php
    $dataProvider = new ActiveDataProvider([
        'query' => backend\models\Customer::find()->
                where(['Customer_id' => $model->customer_id])->
                orderBy('Customer_id DESC'),
        'pagination' => [
            'pageSize' => 20,
        ],
    ]);
    ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'toolbar' => [],
        'panel' => [
            'before' => 'รายละเอียดลูกค้า',
        ],
        'columns' => [
            [
                'attribute' => 'Name',
                'width' => '100px'
            ],
            [
                'attribute' => 'Address',
                'width' => '100px'
            ],
            [
                'attribute' => 'City',
                'width' => '100px'
            ],
        ],
    ]);
    ?>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'Order_No',
            'Order_id',
            'Customer',
            'Salesperson_Code',
            'Salesperson_Name:ntext',
            'Store_No',
            'Event_Code',
            'Brand_Code',
            'Cash_and_Carry',
            'Delivery_Next_Day',
            'Partially_Ship',
            'Create_By_User_ID',
            'customer_id',
        ],
    ])
    ?>

    <table class="table">
        <thead>
            <tr>
                <td>รายการ</td>
                <td>Order_id</td>
                <td>Order_No</td>
                <td>status</td>               
            </tr>
        </thead>
        <tbody>
<?php $no = 1; ?>
<?php foreach (Orderline::find()->where(['Order_hearder_id' => $model->id])->all() as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->Item_No; ?></td> 
                    <td><?= $row->Order_id; ?></td> 
                    <td><?= $row->Order_No; ?></td> 
                    <td><?= $row->status; ?></td> 
                </tr>
<?php endforeach; ?>   
        </tbody>

    </table>

</div>
