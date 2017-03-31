<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Orderline */

$this->title = 'Create Orderline';
$this->params['breadcrumbs'][] = ['label' => 'Orderlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderline-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
