<?php
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\widgets\Select2;
?>

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