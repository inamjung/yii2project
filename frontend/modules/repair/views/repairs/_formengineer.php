<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model frontend\modules\repair\models\Repairs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="repairs-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'department_id')->widget(kartik\widgets\Select2::className(),[
        'data'=> yii\helpers\ArrayHelper::map(frontend\models\Departments::find()->all(), 'id', 'name'),
        'options'=>[
            'placeholder'=>'ระบุแผนกที่ส่งซ่อม...',
            'disabled'=>true
        ],
        'pluginOptions'=>[
            'allowClear'=>true
        ]
    ]) ?>
    
    <?= $form->field($model, 'tool_id')->widget(DepDrop::classname(), [
            'data'=> [$tool],
            'options' => ['placeholder' => 'Select ...',
                'disabled'=>true
                ],
            'type' => DepDrop::TYPE_SELECT2,
            'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
            'pluginOptions'=>[
                'depends'=>['repairs-department_id'],
                'url' => Url::to(['/repair/repairs/get-tool']),
                'loadingText' => 'Loading child level 1 ...',
            ]
        ]);?>
  
     <?= $form->field($model, 'datenotuse')->widget(kartik\widgets\DatePicker::className(),[
        'language'=>'th',
        'options' => ['placeholder' => 'วันที่อุปกรณ์เสีย ...',
            'disabled'=>true
            ],
	'pluginOptions' => [
		'format' => 'yyyy-mm-dd',
		'todayHighlight' => true
	]
    ]) ?>
   
    

    <?= $form->field($model, 'problem')->textarea(['rows' => 4,'readonly'=>true]) ?>

    <?= $form->field($model, 'stage')->dropDownList([ 'รอได้ภายใน 3 วัน' => 'รอได้ภายใน 3 วัน'
        , 'รอได้ภายใน 7 วัน' => 'รอได้ภายใน 7 วัน'
        , 'รอได้ภายใน 1 วัน' => 'รอได้ภายใน 1 วัน', ], ['prompt' => '']
           
            ) ?>

    <hr>
    <label class="label label-primary"> คำสั่งมอบหมาย</label>
    <?= $form->field($model, 'satatus')->radioList([ 'รอรับงาน' => 'รอรับงาน', 'รับงานแล้ว' => 'รับงานแล้ว', ], ['prompt' => '']) ?>
     <?= $form->field($model, 'startdate')->widget(kartik\widgets\DatePicker::className(),[
        'language'=>'th',
        'options' => ['placeholder' => 'วันที่รับซ่อม ...'],
	'pluginOptions' => [
		'format' => 'yyyy-mm-dd',
		'todayHighlight' => true
	]
    ]) ?>
    <?= $form->field($model, 'dateplan')->widget(kartik\widgets\DatePicker::className(),[
        'language'=>'th',
        'options' => ['placeholder' => 'วันที่กำหนดเสร็จ ...'],
	'pluginOptions' => [
		'format' => 'yyyy-mm-dd',
		'todayHighlight' => true
	]
    ]) ?>
    <?= $form->field($model, 'approve')->radioList([ 'อนุมัติ-ซ่อมเอง' => 'อนุมัติ-ซ่อมเอง', 'อนุมัติ-เคลม' => 'อนุมัติ-เคลม', 'อนุมัติ-ช่างนอก' => 'อนุมัติ-ช่างนอก', 'ไม่อนุมัติ' => 'ไม่อนุมัติ', 'รอพิจารณา' => 'รอพิจารณา', ], ['prompt' => '']) ?>

    

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-ok"></i> บันทึก' : '<i class="glyphicon glyphicon-ok"></i> บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
