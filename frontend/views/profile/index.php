<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?= Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'formatter'=>['class'=>'yii\i18n\Formatter','nullDisplay'=>'-'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'user_id',
            [
                'attribute'=>'avatar',
                'format'=>'html',
                'value'=> function($model){
                    return Html::img('avatars/'.$model->avatar,['class'=>'img-responsive','style'=>'width: 80px;']);
                }
            ],
            
            'name',
            'public_email:email',
//            'gravatar_email:email',
//            'gravatar_id',
            // 'location',
            // 'website',
            // 'bio:ntext',    
             [
                'attribute'=> 'department_id',
                'value'=> 'profiledep.name'
            ], 
            [
                'attribute'=> 'position_id',
                'value'=> 'profilepos.name'
            ],       
             
            // 'birthday',
            // 'cid',
             'education',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update}',
                'buttons'=>[
                    'update'=> function($url){
                        return Html::a('<i class="glyphicon glyphicon-edit"></i> แก้ไข',$url,['class'=>'btn btn-info']);
                    }
                ]
                
                ],
        ],
    ]); ?>
</div>
