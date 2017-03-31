<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Orderline;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Orderheader */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $this->registerJs("
    $('.delete-button').click(function() {
        var detail = $(this).closest('.orderheader-detail');
        var updateType = detail.find('.update-type');
        if (updateType.val() === " . json_encode(Orderline::UPDATE_TYPE_UPDATE) . ") {
            //marking the row for deletion
            updateType.val(" . json_encode(Orderline::UPDATE_TYPE_DELETE) . ");
            detail.hide();
        } else {
            //if the row is a new row, delete the row
            detail.remove();
        }

    });
");
?>

<div class="orderheader-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Order_No')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Order_id')->textInput() ?>

    <?= $form->field($model, 'Customer')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'Salesperson_Code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Salesperson_Name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Store_No')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Event_Code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Brand_Code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cash_and_Carry')->textInput() ?>

    <?= $form->field($model, 'Delivery_Next_Day')->textInput() ?>

    <?= $form->field($model, 'Partially_Ship')->textInput() ?>
    <?= $form->field($model, 'Create_By_User_ID')->textInput() ?>
    <hr>
    

    <?php foreach ($modelDetails as $i => $modelDetail) : ?>
        <div class="row orderheader-detail orderheader-detail-<?= $i ?>">
            <div class="col-sm-4">
                <?= Html::activeHiddenInput($modelDetail, "[$i]id") ?>
                <?= Html::activeHiddenInput($modelDetail, "[$i]updateType", ['class' => 'update-type']) ?>
                
                <?= $form->field($modelDetail, "[$i]Item_No")->label('') ->widget(\kartik\select2\Select2::className(),[
                    'data'=> ArrayHelper::map(backend\models\Stock::find()->all(), 'ItemNo','ItemNo'),
                                        'options' => [
                                        'placeholder' => '<--รายการ-->'],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                            ],
                                    ]);
                                ?>
                </div>
                <div class="col-sm-2">
                <?= $form->field($modelDetail, "[$i]Order_id")->label('Order_id') ?>                    
                </div>
            <div class="col-sm-2">
                <?= $form->field($modelDetail,"[{$i}]Order_No")->textInput(['maxlength' => true]) ?>                
                </div>
            <div class="col-sm-2">
                <?= $form->field($modelDetail, "[$i]status") ?>                    
            </div>
            
            <div class="col-md-2">
                <?= Html::button('x', ['class' => 'delete-button btn btn-danger', 'data-target' => "orderheader-detail-$i"]) ?>
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
