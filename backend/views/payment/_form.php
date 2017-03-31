<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Order_No')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Line_No')->textInput() ?>

    <?= $form->field($model, 'Payment_Method_Code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Payment_Amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Card_No')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Card_Expire_Date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Ref_No_1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Ref_No_2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Is_Credit_Card')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
