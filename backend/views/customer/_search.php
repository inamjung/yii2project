<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Customer_id') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'Address') ?>

    <?= $form->field($model, 'Address2') ?>

    <?= $form->field($model, 'City') ?>

    <?php // echo $form->field($model, 'Contact') ?>

    <?php // echo $form->field($model, 'Mobile_No') ?>

    <?php // echo $form->field($model, 'phone_No') ?>

    <?php // echo $form->field($model, 'PostCode') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'Country') ?>

    <?php // echo $form->field($model, 'VAT_Registration_No') ?>

    <?php // echo $form->field($model, 'duplicate_billing_adds') ?>

    <?php // echo $form->field($model, 'BillingAddress') ?>

    <?php // echo $form->field($model, 'BillingAddres2') ?>

    <?php // echo $form->field($model, 'BillingAddressDistrict') ?>

    <?php // echo $form->field($model, 'BillingAddressCity') ?>

    <?php // echo $form->field($model, 'BillingPostCode') ?>

    <?php // echo $form->field($model, 'duplicate_shipto_adds') ?>

    <?php // echo $form->field($model, 'ShipToAddress') ?>

    <?php // echo $form->field($model, 'ShiptoAddress2') ?>

    <?php // echo $form->field($model, 'ShiptoDistrict') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
