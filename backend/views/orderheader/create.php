<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Orderheader */

$this->title = 'Create Orderheader';
$this->params['breadcrumbs'][] = ['label' => 'Orderheaders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderheader-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelDetails' => $modelDetails
    ]) ?>

</div>
