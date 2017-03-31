<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrderheaderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderheader-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Order_No') ?>

    <?= $form->field($model, 'Order_id') ?>

    <?= $form->field($model, 'Customer') ?>

    <?= $form->field($model, 'Salesperson_Code') ?>

    <?php // echo $form->field($model, 'Salesperson_Name') ?>

    <?php // echo $form->field($model, 'Store_No') ?>

    <?php // echo $form->field($model, 'Event_Code') ?>

    <?php // echo $form->field($model, 'Brand_Code') ?>

    <?php // echo $form->field($model, 'Cash_and_Carry') ?>

    <?php // echo $form->field($model, 'Delivery_Next_Day') ?>

    <?php // echo $form->field($model, 'Partially_Ship') ?>

    <?php // echo $form->field($model, 'Create_By_User_ID') ?>

    <?php // echo $form->field($model, 'customer_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
