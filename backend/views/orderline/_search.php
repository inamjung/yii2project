<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrderlineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderline-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Order_id') ?>

    <?= $form->field($model, 'Order_hearder_id') ?>

    <?= $form->field($model, 'Order_No') ?>

    <?= $form->field($model, 'Line_No') ?>

    <?php // echo $form->field($model, 'Item_No') ?>

    <?php // echo $form->field($model, 'Description') ?>

    <?php // echo $form->field($model, 'Get_Back') ?>

    <?php // echo $form->field($model, 'Quantity') ?>

    <?php // echo $form->field($model, 'Price') ?>

    <?php // echo $form->field($model, 'Amout') ?>

    <?php // echo $form->field($model, 'Deliver_Date') ?>

    <?php // echo $form->field($model, 'Install') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
