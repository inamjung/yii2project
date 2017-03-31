<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Orderline */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderline-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Order_id')->textInput() ?>

    <?= $form->field($model, 'Order_hearder_id')->textInput() ?>

    <?= $form->field($model, 'Order_No')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Line_No')->textInput() ?>

    <?= $form->field($model, 'Item_No')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Get_Back')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Amout')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Deliver_Date')->textInput() ?>

    <?= $form->field($model, 'Install')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'open' => 'Open', 'pending' => 'Pending', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
