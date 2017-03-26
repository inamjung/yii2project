<?php
$this->title = 'รายการซ่อมหน่วยงาน';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Url;
use yii\widgets\Pjax;
use app\models\Hospcode;
use kartik\widgets\Select2;
use yii\widgets\ActiveForm;
use app\models\Riskreports;

$datas = $dataProvider->getModels();
?>



<?php
if (isset($dataProvider))
    $dev = \yii\helpers\Html::a('คุณไอน้ำ เรืองโพน', 'https://fb.com/inam06', ['target' => '_blank']);
?>

   
            <div class="col-sm-offset-9 col-sm-1" style="display: none">
        <?php 
       
       $list = ArrayHelper::map(frontend\models\Departments::find()->all(), 'id', 'name');
       
         echo Select2::widget([
            'name' => 'dep',
            'data' => $list,
            'value'=>$dep,            
            'size' => Select2::MEDIUM,
            'options' => ['placeholder' => 'เลือก หน่วยงาน...',
              // 'disabled'=>true
                ],
            'pluginOptions' => [
                'allowClear' => true,                 
            ],
        ]);
        ?>   
            </div>
            
<p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> แจ้งซ่อม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php Pjax::begin(); ?> 
<?php
echo \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
    //'filterModel' => $searchModel,
    'responsive' => TRUE,
    'hover' => true,
    'striped'=>FALSE,
    'exportConfig' => [
        GridView::EXCEL => []
    ],
    'floatHeader' => FALSE,
    'panel' => [
       'heading' => ' รายการซ่อมของแผนกคุณ',
        'before' => '',
        'type' => \kartik\grid\GridView::TYPE_SUCCESS,
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'createDate',
            'label' => 'วันที่ส่งซ่อม',
            'headerOptions' => ['class' => 'text-center'],
            'contentOptions' => ['class' => 'text-left'],
        ],
        
        [
            'attribute' => 'problem',
            'label' => 'สาเหตุส่งซ่อม',
            'headerOptions' => ['class' => 'text-center'],
            //'contentOptions' => ['class' => 'text-center'],
        ],
        [
            'attribute' => 'answer_detail',
            'label' => 'การซ่อม',
            'headerOptions' => ['class' => 'text-center'],
            //'contentOptions' => ['class' => 'text-center'],
        ],
        [
            'attribute' => 'answer',
            'label' => 'สรุป',
            'headerOptions' => ['class' => 'text-center'],
            'contentOptions' => ['class' => 'text-center'],
        ], 
        [
            'attribute' => 'answer',
            'label' => 'แก้ไข',
            'format' => 'raw',            
            'value' => function($model) {
                    return Html::a(Html::encode($model['answer']), [
                                '/repair/repairs/update/',
                                'id' => $model['id'],                               
                    ]);
                },
                        'headerOptions' => ['class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center'],
            ],
        [
            'attribute' => 'answer',
            'label' => 'พิมพ์',
            'format' => 'raw',            
            'value' => function($model) {
                    return Html::a(Html::encode($model['answer']), [
                                '/repair/repairs/report/',
                                'id' => $model['id'],                               
                    ]);
                },
                        'headerOptions' => ['class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center'],
            ],
    ],
]);
?>

