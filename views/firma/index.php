<?php
//dev
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FirmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>

<div class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 align="center">Firmar</h1>
    </div>
    <div class="panel-body">
      <h2> <small>"Certificar que la labor del funcionario esté al día y que haya entregado, registro de notas(si aplica), llaves, equipo u propiedad universitaria y entre otros."</small></h2>
      </div>
      <p>
          <?= Html::a('Firma', ['create'], ['class' => 'btn btn-success']) ?>
      </p>
      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'columns' => [
              ['class' => 'yii\grid\SerialColumn'],

              'id',
              'id_dept',
              'id_supervisor',
              'id_certificacion',
              'firma',

              ['class' => 'yii\grid\ActionColumn'],
          ],
      ]); ?>
      <div class="panel-footer">
    </div>
    </div>
</div>
</div>
