<?php

namespace app\controllers;
use Yii;
use yii\base\Model;
use app\models\Firma;
use app\models\FirmaSearch;
use app\models\Supervisor;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * FirmaController implements the CRUD actions for Firma model.
 */
class FirmaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Firma models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FirmaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Firma model.
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
     * Creates a new Firma model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $sup_email = Yii::$app->user->identity->email;
        $supervisor = $this->findSup($sup_email);

        $model = new Firma();
        $model->id_certificacion = $id; //checklater
        $model->id_dept = $supervisor->id_dept;
        $model->id_supervisor = $supervisor->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['site/index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Firma model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Firma model.
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
     * Finds the Firma model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Firma the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Firma::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findCert($id)
    {
        if (($model = Firma::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
    *
    *
    */
    protected function findCertificacion($id)
    {
        if (($model = Supervisor::find()->where(['id_dept' => $id])->all()) !== null) {//findOne($id)) !== null) {
      //  find()->where(['id_dept' => $id])->all()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * Finds the Supervisor model based on its email key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Firma the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findSup($email)
    {
        if (($model = Supervisor::findOne(['email' => $email])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
