<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\repair\models\Tooltypes */

$this->title = 'Create Tooltypes';
$this->params['breadcrumbs'][] = ['label' => 'Tooltypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tooltypes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
