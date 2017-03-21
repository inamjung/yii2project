<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 't')->textInput() ?>

    <?= $form->field($model, 'a')->textInput() ?>

    <?= $form->field($model, 'c')->widget(Select2::className(),[
        'data'=> \yii\helpers\ArrayHelper::map(frontend\models\Chw::find()->all(), 'id', 'name'),
        'options'=>[
            'placeholder'=>'เลือกจังหวัด'
        ],
        'pluginOptions'=>[
            'allowClear'=>true
        ]
    ]) ?>

    <?= $form->field($model, 'birthday')->widget(kartik\widgets\DatePicker::className(),[
        'language'=>'th',
        'options' => ['placeholder' => 'ระบุวันที่ ...'],
	'pluginOptions' => [
		'format' => 'yyyy-mm-dd',
		'todayHighlight' => true
	]
    ]) ?>

    <?= $form->field($model, 'cid')->widget(yii\widgets\MaskedInput::className(),[
        'mask'=>'9-9999-99999-99-9'
    ]) ?>

    <?= $form->field($model, 'p')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->widget(yii\widgets\MaskedInput::className(),[
        'mask'=>'999-9999-999'
    ]) ?>

    <?= $form->field($model, 'work')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_id')->widget(kartik\widgets\Select2::className(),[
        'data'=> \yii\helpers\ArrayHelper::map(frontend\models\Departments::find()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'เลือกแผนก...'],
            'pluginOptions' => [
                'allowClear' => true
    ],
    ]) ?>

    <?php //echo $form->field($model, 'group_id')->textInput() ?>

    <?= $form->field($model, 'position_id')->widget(kartik\widgets\Select2::className(),[
        'data'=> \yii\helpers\ArrayHelper::map(frontend\models\Positions::find()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'เลือกตำแหน่ง...'],
            'pluginOptions' => [
                'allowClear' => true
    ],
    ]) ?>

    <?= $form->field($model, 'interest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <?= $form->field($model, 'updatedate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
