<?php
//dev
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FirmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Firma';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 align ="center">Firmar</h1>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>




    </div>


  <div class="pregunta-index">
      <h1><?= Html::encode($this->title) ?></h1>
      <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



      <?= GridView::widget([

          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'columns' => [
              ['class' => 'yii\grid\SerialColumn'],

              //'id',//no hacerlo visible para el usuario
              //'id_dept',//no hacerlo visible para el usuario
              //'pregunta:ntext',// colocar la pregunta
              'no_bool',//colocarlo checkbox
              'si_bool',//colocarlo checkbox
              'na_bool',//colocarlo checkbox
              //setcomentaros
              ['class' => 'yii\grid\ActionColumn'],
          ],
      ]); ?>
  </div>
  <!-- <p>
      <?= Html::a('Create Pregunta', ['create'], ['class' => 'btn btn-success']) ?>
  </p> -->
  <div class="firma-index">
  <div class="row">
      <div class="col-sm-6">
        <div class="panel panel-defaul">
                  <h1 align ="center"<button class="btn btn-default" type="submit">Aceptar</button>
                    <h1 align ="center"<button class="btn btn-default" type="submit">Rechazar</button>
              </div>
            </div>

    <!-- <h1><?= Html::encode($this->title) ?></h1>//antes
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Firma', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_supervisor',
            'id_certificacion',
            'firma',
            'fecha_firma',
            'created_at:date',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <!--  -->
</div>
