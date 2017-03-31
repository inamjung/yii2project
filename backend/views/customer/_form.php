<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Address2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'City')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Contact')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Mobile_No')->textInput() ?>

    <?= $form->field($model, 'phone_No')->textInput() ?>

    <?= $form->field($model, 'PostCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Country')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'VAT_Registration_No')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duplicate_billing_adds')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'BillingAddress')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'BillingAddres2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'BillingAddressDistrict')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'BillingAddressCity')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'BillingPostCode')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'duplicate_shipto_adds')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ShipToAddress')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ShiptoAddress2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ShiptoDistrict')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
