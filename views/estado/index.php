<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use app\models\Empleado;

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
                //['class' => 'yii\grid\SerialColumn'],

                //'id',
                'estado',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

      </div>
      <div class="panel-footer">
        <button class="btn btn-default" type="submit"><a href="index.php?r=resultado%2Findex">Ver Resultados</a></button>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1>Lista de Solicitudes</h1>
      </div>
      <div class="panel-body">

        <p>Solicitudes ya firmadas.</p>
        <?php
            $form = ActiveForm::begin();
            $i = 0;
            foreach($empleado as $employees):?>

            <?=$form->field($employees, 'id')->radioList(array(1=>$employees->nombre), array('class' => 'i-checks'))->label(false);
              $i++;

          endforeach;
          ActiveForm::end();
        ?>

      </div>
      <div class="panel-footer">
        <button class="btn btn-default" type="submit"><a href="index.php?r=pregunta%2Findex">Firmar</a></button>
      </div>
    </div>
  </div>


</div>
