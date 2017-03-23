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
    
  <ul class="nav nav-tabs">
  <li class=""><a href="#home" data-toggle="tab" aria-expanded="true">Home</a></li>
  <li class="active"><a href="#profile" data-toggle="tab" aria-expanded="false">Profile</a></li>
  
</ul>
    
<div id="myTabContent" class="tab-content">
    
  <div class="tab-pane fade" id="home">
     <?= $this->render('_formbosstab1', [
        'form'=>$form,
        'model' => $model,
        'tool'=>$tool
    ]) ?>
  </div>
  <div class="tab-pane fade  active in" id="profile">
     <?= $this->render('_formbosstab2', [
        'form'=>$form,
        'model' => $model,
        'tool'=>$tool
    ]) ?>
  </div>
  
</div>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-ok"></i> บันทึก' : '<i class="glyphicon glyphicon-ok"></i> บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
