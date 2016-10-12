<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 align ="center">Recursos Humanos</h1>
      </div>
      <div class="panel-footer">
        <?= Html::a('Ver solicitud', ['estado/index'],['class' => 'btn btn-info']);?>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1>Solicitar</h1>
      </div>
      <div class="panel-body">
        <h4>Solicitar una certificación de relevo de responsabilidad de empleado</h4>
      </div>
      <div class="panel-footer">
        <?= Html::a('Solicitar', ['solicitar/create'],['class' => 'btn btn-info']);?>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1>Firmar</h1>
      </div>
      <div class="panel-body">
        <h4>Solicitudes de los empleados a firmar: </h4>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                
                    'empleado.Solicitante',
                [
                    'label' => 'Firmar',
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::a('Firmar', ['resultado/create','cert_id' => $model->id], ['class' => 'btn btn-info btn-xs']);
                    }
                ],

              ],
        ]) ?>

      </div>
      <div class="panel-footer">
      </div>
    </div>
  </div>
</div>
