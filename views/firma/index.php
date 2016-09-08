<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FirmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Firmas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firma-index">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 align ="center">Firmar</h1>
      </div>
      <div class="panel-body">
        
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
                // 'created_at',
                // 'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

        <button class="btn btn-default" type="submit">Aceptar</button>
        <button class="btn btn-default" type="submit">Rechazar</button>

      </div>
    </div>
  </div>
</div>
