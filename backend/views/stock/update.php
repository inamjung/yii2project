<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Stock */

$this->title = 'Update Stock: ' . $model->ItemNo;
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ItemNo, 'url' => ['view', 'id' => $model->ItemNo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
