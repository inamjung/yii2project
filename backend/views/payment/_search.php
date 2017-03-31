<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PaymentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Payment_id') ?>

    <?= $form->field($model, 'Order_No') ?>

    <?= $form->field($model, 'Line_No') ?>

    <?= $form->field($model, 'Payment_Method_Code') ?>

    <?= $form->field($model, 'Payment_Amount') ?>

    <?php // echo $form->field($model, 'Card_No') ?>

    <?php // echo $form->field($model, 'Card_Expire_Date') ?>

    <?php // echo $form->field($model, 'Ref_No_1') ?>

    <?php // echo $form->field($model, 'Ref_No_2') ?>

    <?php // echo $form->field($model, 'Is_Credit_Card') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
