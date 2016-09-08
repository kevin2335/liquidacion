<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FirmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Firma';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firma-index">
  <div class="panel panel-default">
      <div class="panel-heading">
        <h1 align ="center">Firmar</h1>


      </div>
      <div class="panel-body">

        <p>
          Seguro que desea firmar?
        </p>


        <button class="btn btn-default" type="submit">Aceptar</button>
        <button class="btn btn-default" type="submit">Rechazar</button>

      </div>
    </div>
  </div>
<<<<<<< HEAD
=======
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


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <!--  -->
</div>
>>>>>>> refs/remotes/origin/master
