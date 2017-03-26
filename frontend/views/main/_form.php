<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Detail;

/* @var $this yii\web\View */
/* @var $model frontend\models\Main */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $this->registerJs("
    $('.delete-button').click(function() {
        var detail = $(this).closest('.main-detail');
        var updateType = detail.find('.update-type');
        if (updateType.val() === " . json_encode(frontend\models\Detail::UPDATE_TYPE_UPDATE) . ") {
            //marking the row for deletion
            updateType.val(" . json_encode(frontend\models\Detail::UPDATE_TYPE_DELETE) . ");
            detail.hide();
        } else {
            //if the row is a new row, delete the row
            detail.remove();
        }

    });
");
?>

<div class="main-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'department_id')->widget(kartik\widgets\Select2::className(),[
        'data'=> \yii\helpers\ArrayHelper::map(frontend\models\Departments::find()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'เลือกแผนก...'],
            'pluginOptions' => [
                'allowClear' => true
    ],
    ]) ?>   
    
    <?php foreach ($modelDetails as $i => $modelDetail) : ?>
        <div class="row main-detail main-detail-<?= $i ?>">
            <div class="col-sm-4">
                <?= Html::activeHiddenInput($modelDetail, "[$i]id") ?>
                <?= Html::activeHiddenInput($modelDetail, "[$i]updateType", ['class' => 'update-type']) ?>
                
                </div>
                <div class="col-sm-2">
                <?= $form->field($modelDetail, "[$i]name")->label('จำนวนเบิก') ?>                    
                </div>
            <div class="col-sm-2">
                <?= $form->field($modelDetail,"[{$i}]qty")->textInput(['maxlength' => true]) ?>                
                </div>
            
            <div class="col-md-2">
                <?= Html::button('x', ['class' => 'delete-button btn btn-danger', 'data-target' => "main-detail-$i"]) ?>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="form-group">
       <div class="row">
           <div class="col-sm-offset-1 col-sm-2">
               <?= Html::submitButton('<i class="glyphicon glyphicon-plus"></i> เพิ่มรายการเบิก', ['name' => 'addRow', 'value' => 'true', 'class' => 'btn btn-info']) ?>
           </div>
           <div class="col-sm-offset-2 col-sm-2">
               <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-ok"></i> บันทึก' : '<i class="glyphicon glyphicon-ok"></i> บันทึกการแก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
           </div>         
           
       </div>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>
