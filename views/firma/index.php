<?php
//dev
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FirmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 align ="center">Firmar</h1>
      </div>
<div class="firma-index">
  $this->title = 'Preguntas';
  $this->params['breadcrumbs'][] = $this->title;
  ?>
  <div class="pregunta-index">

      <h1><?= Html::encode($this->title) ?></h1>
      <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

      <p>
          <?= Html::a('Create Pregunta', ['create'], ['class' => 'btn btn-success']) ?>
      </p>
      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'columns' => [
              ['class' => 'yii\grid\SerialColumn'],

              'id',
              'id_dept',
              'pregunta:ntext',
              'no_bool',
              'si_bool',
              // 'na_bool',

              ['class' => 'yii\grid\ActionColumn'],
          ],
      ]); ?>
  </div>

    <!-- <h1><?= Html::encode($this->title) ?></h1>
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
</div> -->
