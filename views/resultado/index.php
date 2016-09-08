<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResultadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resultados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resultado-index">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 align ="center">Resultados</h1>
    </div>
    <div class="panel-body">
      <h1><?= Html::encode($this->title) ?></h1>
      <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

      <p>
          <?= Html::a('Create Resultado', ['create'], ['class' => 'btn btn-success']) ?>
      </p>
      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'columns' => [
              ['class' => 'yii\grid\SerialColumn'],

              'id',
              'id_supervisor',
              'id_certificacion',
              'resultado',
              'si_bool',
              // 'no_bool',
              // 'na_bool',
              // 'comentario:ntext',
              // 'created_at',
              // 'updated_at',

              ['class' => 'yii\grid\ActionColumn'],
          ],
      ]); ?>
    </div>
    <div class="panel-footer">

    </div>
  </div>

</div>
