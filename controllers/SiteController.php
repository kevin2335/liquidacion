<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Empleado;
use app\models\Certificacion;
use app\models\CertificacionDeptSearch;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionCreate()
    {


        /*$certificacion_id = 1;
        $empleado_id = $this->findEmpleado($certificacion_id);
        $empleado = 1;
        foreach($empleado_id as $key=>$certificacion_id)
        {
          $empleado = new Empleado();
          $empleado -> id_certificacion = $certificacion_id;
        }
        $this->render()*/
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel2 = new CertificacionDeptSearch();
        $dataProvider = $searchModel2->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel2' => $searchModel2,
            'dataProvider' => $dataProvider,
        ]);
        //$estado_id = 1;
        //$solicitudes = $this->findCertificacion($estado_id);
        //$empleado = Empleado::find()->all();
        //$empleado = Empleado::find()->select('nombre, apellido_p')->all();
        //return $this->render('index',['empleado'=>$empleado]);
        //return $this->render('index');

    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    protected function findCertificacion($estado_id)
    {
        if (($model = Certificacion::find()->where(['id_estado' =>$estado_id])->all()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
