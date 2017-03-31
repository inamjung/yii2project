<?php

namespace backend\controllers;

use Yii;
use backend\models\Orderheader;
use backend\models\OrderheaderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\data\ActiveDataProvider;
use yii\base\Model;
use backend\models\Orderline;

/**
 * OrderheaderController implements the CRUD actions for Orderheader model.
 */
class OrderheaderController extends Controller
{
    /**
     * @inheritdoc
     */
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
     * Lists all Orderheader models.
     * @return mixed
     */
//    public function actionIndex()
//    {
//        $searchModel = new OrderheaderSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }
     public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => Orderheader::find()->orderBy('id desc'),
        ]);
        
        return $this->render('index', [
                   
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orderheader model.
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
     * Creates a new Orderheader model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate() {
        $model = new Orderheader();
        $modelDetails = [];

        $formDetails = Yii::$app->request->post('Orderline', []);
        foreach ($formDetails as $i => $formDetail) {
            $modelDetail = new \backend\models\Orderline(['scenario' => \backend\models\Orderline::SCENARIO_BATCH_UPDATE]);
            $modelDetail->setAttributes($formDetail);
            $modelDetails[] = $modelDetail;
        }

        //handling if the addRow button has been pressed
        if (Yii::$app->request->post('addRow') == 'true') {
            $model->load(Yii::$app->request->post());
            $modelDetails[] = new \backend\models\Orderline(['scenario' => \backend\models\Orderline::SCENARIO_BATCH_UPDATE]);
            return $this->render('create', [
                        'model' => $model,
                        'modelDetails' => $modelDetails
            ]);
        }

        if ($model->load(Yii::$app->request->post())) {            
            if (Model::validateMultiple($modelDetails) && $model->validate()) {                       
                $model->save();
                foreach ($modelDetails as $modelDetail) {
                    $modelDetail->Order_hearder_id = $model->id;
                    $modelDetail->save();
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
                    'modelDetails' => $modelDetails
        ]);
    }

    
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $modelDetails = $model->orderlist;

        $formDetails = Yii::$app->request->post('Orderline', []);
        foreach ($formDetails as $i => $formDetail) {
            //loading the models if they are not new
            if (isset($formDetail['id']) && isset($formDetail['updateType']) && $formDetail['updateType'] != \backend\models\Orderline::UPDATE_TYPE_CREATE) {
                //making sure that it is actually a child of the main model
                $modelDetail = \backend\models\Orderline::findOne(['id' => $formDetail['id'], 'Order_hearder_id' => $model->id]);
                $modelDetail->setScenario(\backend\models\Orderline::SCENARIO_BATCH_UPDATE);
                $modelDetail->setAttributes($formDetail);
                $modelDetails[$i] = $modelDetail;
                //validate here if the modelDetail loaded is valid, and if it can be updated or deleted
            } else {
                $modelDetail = new \backend\models\Orderline(['scenario' => \backend\models\Orderline::SCENARIO_BATCH_UPDATE]);
                $modelDetail->setAttributes($formDetail);
                $modelDetails[] = $modelDetail;
            }
        }

        //handling if the addRow button has been pressed
        if (Yii::$app->request->post('addRow') == 'true') {
            $modelDetails[] = new Orderline(['scenario' => \backend\models\Orderline::SCENARIO_BATCH_UPDATE]);
            return $this->render('update', [
                        'model' => $model,
                        'modelDetails' => $modelDetails
            ]);
        }
       

        if ($model->load(Yii::$app->request->post())) {
            if (Model::validateMultiple($modelDetails) && $model->validate()) {
                
                
                $model->save();
                foreach ($modelDetails as $modelDetail) {
                    //details that has been flagged for deletion will be deleted
                    if ($modelDetail->updateType == \backend\models\Orderline::UPDATE_TYPE_DELETE) {
                        $modelDetail->delete();
                    } else {
                        //new or updated records go here
                        
                        
                        $modelDetail->Order_hearder_id = $model->id;
                        $modelDetail->save();
                        
                    }
                }
                return $this->redirect(['index']);
            }
        }


        return $this->render('update', [
                    'model' => $model,
                    'modelDetails' => $modelDetails
        ]);
    }

    /**
     * Deletes an existing Orderheader model.
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
     * Finds the Orderheader model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orderheader the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orderheader::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
