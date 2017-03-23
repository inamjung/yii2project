<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Main;
use frontend\models\MainSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Detail;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * MainController implements the CRUD actions for Main model.
 */
class MainController extends Controller
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
     * Lists all Main models.
     * @return mixed
     */
//    public function actionIndex()
//    {
//        $searchModel = new MainSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }

    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => Main::find()->orderBy('date desc'),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Main model.
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
     * Creates a new Main model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new Main();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
//    }
//
//    /**
//     * Updates an existing Main model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }
public function actionCreate() {
        $model = new Main();
        $modelDetails = [];

        $formDetails = Yii::$app->request->post('Detail', []);
        foreach ($formDetails as $i => $formDetail) {
            $modelDetail = new \frontend\models\Detail(['scenario' => \frontend\models\Detail::SCENARIO_BATCH_UPDATE]);
            $modelDetail->setAttributes($formDetail);
            $modelDetails[] = $modelDetail;
        }

        //handling if the addRow button has been pressed
        if (Yii::$app->request->post('addRow') == 'true') {
            $model->load(Yii::$app->request->post());
            $modelDetails[] = new Detail(['scenario' => Detail::SCENARIO_BATCH_UPDATE]);
            return $this->render('create', [
                        'model' => $model,
                        'modelDetails' => $modelDetails
            ]);
        }

        if ($model->load(Yii::$app->request->post())) {            
            if (Model::validateMultiple($modelDetails) && $model->validate()) {
               $model->user_id = Yii::$app->user->identity->id;
               $model->date = date('Y-m-d');
//               $model->status = 'no';
                $model->save();
                foreach ($modelDetails as $modelDetail) {
                    $modelDetail->main_id = $model->id;
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
        $modelDetails = $model->detailes;
        
        //$receive = new Subrecievedetail();

        $formDetails = Yii::$app->request->post('Detail', []);
        foreach ($formDetails as $i => $formDetail) {
            //loading the models if they are not new
            if (isset($formDetail['id']) && isset($formDetail['updateType']) && $formDetail['updateType'] != \frontend\models\Detail::UPDATE_TYPE_CREATE) {
                //making sure that it is actually a child of the main model
                $modelDetail = \frontend\models\Detail::findOne(['id' => $formDetail['id'], 'main_id' => $model->id]);
                $modelDetail->setScenario(\frontend\models\Detail::SCENARIO_BATCH_UPDATE);
                $modelDetail->setAttributes($formDetail);
                $modelDetails[$i] = $modelDetail;
                //validate here if the modelDetail loaded is valid, and if it can be updated or deleted
            } else {
                $modelDetail = new \frontend\models\Detail(['scenario' => \frontend\models\Detail::SCENARIO_BATCH_UPDATE]);
                $modelDetail->setAttributes($formDetail);
                $modelDetails[] = $modelDetail;
            }
        }

        //handling if the addRow button has been pressed
        if (Yii::$app->request->post('addRow') == 'true') {
            $modelDetails[] = new \frontend\models\Detail(['scenario' => \frontend\models\Detail::SCENARIO_BATCH_UPDATE]);
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
                    if ($modelDetail->updateType == \frontend\models\Detail::UPDATE_TYPE_DELETE) {
                        $modelDetail->delete();
                    } else {
                        //new or updated records go here
                        
                        
                        $modelDetail->main_id = $model->id;
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
     * Deletes an existing Main model.
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
     * Finds the Main model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Main the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Main::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
