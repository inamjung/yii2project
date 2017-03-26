<?php

namespace frontend\modules\repair\controllers;

use Yii;
use frontend\modules\repair\models\Repairs;
use frontend\modules\repair\models\RepairsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\widgets\DepDrop;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\mpdf\Pdf;
use yii\data\ArrayDataProvider;
use dektrium\user\models\User;
use dektrium\user\models\Profile;

/**
 * RepairsController implements the CRUD actions for Repairs model.
 */
class RepairsController extends Controller
{
    /**
     * @inheritdoc
     */
    //public $enableCsrfValidation = false;
    //public $layout = 'my_main';
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Repairs models.
     * @return mixed
     */
    public function actionIndex()
    {
       
        //$dep =  Yii::$app->user->identity->profile->department_id;
        $searchModel = new RepairsSearch();
        $searchModel->user_id = Yii::$app->user->identity->profile->user_id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
       
    }
    public function actionIndexengineer()
    {
        $searchModel = new RepairsSearch(['satatus'=>'รับงานแล้ว']);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('indexengineer', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndexapprove()
    {
        $searchModel = new RepairsSearch(['satatus'=>'รอรับงาน']);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('indexapprove', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Repairs model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Repairs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Repairs();

        if ($model->load(Yii::$app->request->post())) {
                $model->createDate = date('Y-m-d');
                $model->user_id = Yii::$app->user->identity->id;
                $model->save(); 
            return $this->redirect(['/repair/repairlinebot/curl']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Repairs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tool = ArrayHelper::map($this->getTool($model->department_id), 'id', 'name');

        if ($model->load(Yii::$app->request->post())) {
           
            
            $model->save();
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['repairdep']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'tool'=>$tool
            ]);
        }
    }
    public function actionUpdateboss($id)
    {
        $model = $this->findModel($id);
        $tool = ArrayHelper::map($this->getTool($model->department_id), 'id', 'name');

        if ($model->load(Yii::$app->request->post())) {
           
            
            $model->save();
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['indexapprove']);
        } else {
            return $this->render('updateboss', [
                'model' => $model,
                'tool'=>$tool
            ]);
        }
    }
    public function actionUpdateengineer($id)
    {
        $model = $this->findModel($id);
        $tool = ArrayHelper::map($this->getTool($model->department_id), 'id', 'name');

        if ($model->load(Yii::$app->request->post())) {
           
            
            $model->save();
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['indexengineer']);
        } else {
            return $this->render('updateengineer', [
                'model' => $model,
                'tool'=>$tool
            ]);
        }
    }

    /**
     * Deletes an existing Repairs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Repairs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Repairs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Repairs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGetTool(){
        $out = [];
        if (isset($_POST['depdrop_parents'])){
            $parents = $_POST['depdrop_parents'];
            if ($parents != NULL){
                $department_id = $parents[0];
                $out = $this->getTool($department_id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }    
    protected function getTool($id){
        $datas = \frontend\modules\repair\models\Tools::find()->where(['department_id'=>$id])->all();
        return $this->MapData($datas,'id','name');
    }
    protected function MapData($datas,$fieldID,$fieldName){
        $obj = [];
        foreach ($datas as $key => $value){
            array_push($obj, ['id'=>$value->{$fieldID},'name'=>$value->{$fieldName}]);
        }
        return $obj;
    }
    public function actionReport($id) {
    // get your HTML raw content without any layouts or scripts
   $model = Repairs::find()->where(['id' => $id])->one();
    $content = $this->renderPartial('_reportView',[
            'model' => $model,
        ]);
    $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'marginRight'=>false,
            'marginLeft'=>19,
            'marginTop'=>15,
            'marginBottom'=>false,
            'marginHeader'=>false,
            'marginFooter'=>false,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'ใบแจ้งซ่อม'],
            // call mPDF methods on the fly
            'methods' => [
            //'SetHeader' => ['Krajee Report Header'],
            // 'SetFooter' => ['{PAGENO}'],
               
            ]
        ]);
        return $pdf->render();
    }
  
    public function actionReport1($dep=null,$total=null){
        
        $sql="SELECT d.`name` as dep,count(re.id) as total
            FROM repairs re
            LEFT JOIN departments d on d.id=re.department_id
            GROUP BY d.id";
        
        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels'=>$rawData,
            'pagination'=>[
                'pagesize'=>10
            ]
        ]);
        
        return $this->render('report1',[
            'dataProvider'=>$dataProvider,
            'sql'=>$sql,
            'rawData'=>$rawData,
            'dep'=>$dep,
            'total'=>$total
        ]);
    }
    
    public function actionReport2(){
     $connection = Yii::$app->db;
     $data = $connection->createCommand("SELECT d.`name` as dep
            ,count(re.id) as total
            FROM repairs re
            LEFT JOIN departments d on d.id=re.department_id
            GROUP BY d.id")->queryAll();
         
        for ($i = 0; $i < sizeof($data); $i++) {
            $dep[] = $data[$i]['dep'];
            $total[] = $data[$i]['total']*1; 
        }
        
        $dataProvider = new ArrayDataProvider([
                'allModels'=>$data, 
            ]);
        return $this->render('report2',[
            'dataProvider'=>$dataProvider,  
            'dep'=>$dep,
            'total'=>$total
        ]);
    }
  public function actionRepairdep($date1 = null, $date2 = null,$dep=null,$depname=null) {
        
        if ($date1 == null) {
            $date1 = date('2014-10-01');
            $date2 = date('Y-m-d');
            $dep =  Yii::$app->user->identity->profile->department_id;
        }
        $sql = "SELECT re.id,re.createDate
            ,re.problem ,re.answer ,re.department_id,dd.`name` as depname 
            FROM repairs re 
            LEFT JOIN tools t on t.id=re.tool_id 
            LEFT JOIN departments dd on dd.id=re.department_id
            WHERE dd.id='$dep'
            AND re.createDate between '2017-03-01' AND '2017-03-31' 
            ORDER BY re.createDate desc ";
        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $rawData,
            'pagination' => false,
        ]);

        Yii::$app->session->setFlash('warning', 'แจ้งซ่อมหน่วยงานคุณ ');
        return $this->render('repairdep', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql,
                    'date1' => $date1,
                    'date2' => $date2,                    
                    'dep' => $dep,
                    'depname'=>$depname
        ]);
    }
}
