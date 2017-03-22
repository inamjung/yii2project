<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\repair\models\TbTest */

$this->title = 'Create Tb Test';
$this->params['breadcrumbs'][] = ['label' => 'Tb Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-test-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
