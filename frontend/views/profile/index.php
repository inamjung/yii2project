<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'name',
            'public_email:email',
            'gravatar_email:email',
            'gravatar_id',
            // 'location',
            // 'website',
            // 'bio:ntext',
            // 'avatar',
            // 'department_id',
            // 'position_id',
            // 'birthday',
            // 'cid',
            // 'education',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
