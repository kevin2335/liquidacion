<?php

namespace app\controllers;
use Yii;
use yii\base\Model;
use app\models\Firma;
use app\models\FirmaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Supervisor;

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
    public function actionCreate($cert_id = 1)
    {

      // $dept_id = 1;
      // $sup_id = $this->findCertificacion($dept_id);
      // $firmas = [];
      // foreach($sup_id as $key => $id_supervisor) {
      //   $firmas []= new Firma();
      //   $firmas[$key]->id_dept= $dept_id->id_dept;
      //   $resultados[$key]->id_certificacion = $cert_id;
      //   $firmas[$key]->id_supervisor = $sup_id->id_supervisor;
      // }
      // if (Model::loadMultiple($firmas, Yii::$app->request->post()) && Model::validateMultiple($firmas)) {
      //     foreach ($firmas as $firma) {
      //       $firma->save(false);
      //     }
      $model = new Firma();

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
    // protected function findCert($id)
    // {
    //     if (($model = Firma::findOne($id)) !== null) {
    //         return $model;
    //     } else {
    //         throw new NotFoundHttpException('The requested page does not exist.');
    //     }
    // }
    // /**
    // *
    // *
    // */
    // protected function findCertificacion($id)
    // {
    //     if (($model = Supervisor::find()->where(['id_dept' => $id])->all()) !== null) {
    //         return $model;
    //     } else {
    //         throw new NotFoundHttpException('The requested page does not exist.');
    //     }
    // }
}
