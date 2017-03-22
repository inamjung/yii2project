<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\Url;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>    

    <?= $form->field($model, 'name')->label('ชื่อ-สกุล')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'public_email')->label('อิเมลล์')->textInput(['maxlength' => true]) ?>   

    <?= $form->field($model, 'location')->label('ที่อยู่')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bio')->label('ประวัติการทำงาน')->textarea(['rows' => 6]) ?>
    

    <?= $form->field($model, 'department_id')->label('แผนก')->widget(kartik\widgets\Select2::className(),[
        'data'=> \yii\helpers\ArrayHelper::map(frontend\models\Departments::find()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'เลือกแผนก...'],
            'pluginOptions' => [
                'allowClear' => true
    ],
    ]) ?>

    <?= $form->field($model, 'position_id')->label('ตำแหน่ง')->widget(kartik\widgets\Select2::className(),[
        'data'=> \yii\helpers\ArrayHelper::map(frontend\models\Positions::find()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'เลือกตำแหน่ง...'],
            'pluginOptions' => [
                'allowClear' => true
    ],
    ]) ?>

     <?= $form->field($model, 'birthday')->label('วันเกิด')->widget(kartik\widgets\DatePicker::className(),[
        'language'=>'th',
        'options' => ['placeholder' => 'ระบุวันที่ ...'],
	'pluginOptions' => [
		'format' => 'yyyy-mm-dd',
		'todayHighlight' => true
	]
    ]) ?>

     <?= $form->field($model, 'cid')->label('เลขบัตรประชาชน')->widget(yii\widgets\MaskedInput::className(),[
        'mask'=>'9-9999-99999-99-9',
        'clientOptions' => [
            'removeMaskOnSubmit' => true]
    ]) ?>

    <?= $form->field($model, 'education')->label('ระดับการศึกษา')->radioList(['ต่ำกว่าป.ตรี'=>'ต่ำกว่าป.ตรี','ป.ตรี'=>'ป.ตรี','สูงกว่าป.ตรี'=>'สูงกว่าป.ตรี']) ?>
    <hr>
    
    <?= $form->field($model, 'avatar_img')->label('รูปประจำตัว')->fileInput() ?>       
                  
    <?php if ($model->avatar) { ?>
            <?= Html::img('avatars/' . $model->avatar, ['class' => 'img-responsive img-circle', 'width' => '150px;']); ?>
    <?php } ?> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-ok"></i> บันทึก' : '<i class="glyphicon glyphicon-ok"></i> บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
