<?php
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\widgets\Select2;
?>
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

    <hr>
    <label class="label label-primary"> ส่วนของช่าง</label>
    

    <?= $form->field($model, 'remark')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'answer')->radioList([ 'รอซ่อม' => 'รอซ่อม', 'กำลังซ่อม' => 'กำลังซ่อม', 'ซ่อมเสร็จแล้ว' => 'ซ่อมเสร็จแล้ว', 'ซ่อมไม่ได้' => 'ซ่อมไม่ได้', ], ['prompt' => '']) ?>


     <?= $form->field($model, 'enddate')->widget(kartik\widgets\DatePicker::className(),[
        'language'=>'th',
        'options' => ['placeholder' => 'วันที่ซ่อมเสร็จ ...'],
	'pluginOptions' => [
		'format' => 'yyyy-mm-dd',
		'todayHighlight' => true
	]
    ]) ?>