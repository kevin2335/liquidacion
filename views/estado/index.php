<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EstadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Estados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-index">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 align ="center">Solicitudes</h1>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1>Estado de la Solicitud</h1>
      </div>
      <div class="panel-body">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                'estado.estado',
                [
                    'label' => 'Ver resultados',
                    'format' => 'html',
                    'value' => function ($model) {
                        //echo $model->id;
                        return Html::a('Resultado', ['resultado/index', 'id' => $model->id],['class' => 'btn btn-info btn-xs']);
                    }
                ],
              ]
            ]); ?>

      </div>
      <div class="panel-footer">

      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1>Solicitudes ya procesadas</h1>
      </div>
      <div class="panel-body">


        <?php
          echo GridView::widget([
              'dataProvider' => $empleado,
              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],
                  'empleado.Solicitante',

                  //'supervisor_id',
                  'empleado.razon_cese',


                ],
              ]);
        ?>

      </div>
    </div>
  </div>

</div>
