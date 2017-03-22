<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\repair\models\Repairs */

$this->title = 'Update Repairs: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Repairs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="repairs-update">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->
    <div class="panel panel-warning">
        <div class="panel-heading"><i class="glyphicon glyphicon-pencil"></i> ช่างซ่อม</div>
        <div class="panel-body">
            <?=
            $this->render('_form', [
                'model' => $model,
                'tool' => $tool
            ])
            ?>

        </div>
    </div>
</div>