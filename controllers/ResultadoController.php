<?php

namespace app\controllers;

use Yii;
use yii\base\Model;
use app\models\Resultado;
use app\models\Pregunta;
use app\models\ResultadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ResultadoController implements the CRUD actions for Resultado model.
 */
class ResultadoController extends Controller
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
     * Lists all Resultado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ResultadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Resultado model.
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
     * Creates a new Resultado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $dept_id = 1;
        $sup_id = 1;
        $cert_id = 2;
        $preguntas = $this->findPreguntas($dept_id);
        $resultados = [];
        foreach($preguntas as $key => $pregunta) {
            $resultados[] = new Resultado();
            $resultados[$key]->id_supervisor = $sup_id;
            $resultados[$key]->id_certificacion = $cert_id;
            $resultados[$key]->pregunta = $pregunta->pregunta;
            $resultados[$key]->_si = $pregunta->si_bool;
            $resultados[$key]->_no = $pregunta->no_bool;
            $resultados[$key]->_na = $pregunta->na_bool;
        }

        if (Model::loadMultiple($resultados, Yii::$app->request->post()) && Model::validateMultiple($resultados)) {

            foreach ($resultados as $resultado) {
              $resultado->save(false);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'resultados' => $resultados,
            ]);
        }
    }

    /**
     * Updates an existing Resultado model.
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
     * Deletes an existing Resultado model.
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
     * Finds the Resultado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Resultado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Resultado::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * Finds the Preguntas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Resultado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findPreguntas($id)
    {
        if (($models = Pregunta::find()->where(['id_dept' => $id])->all()) !== null) {
            return $models;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
