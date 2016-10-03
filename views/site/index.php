<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
//use app\models\Empleado;

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
        <a href="?r=estado%2Findex"><button class="btn btn-default btn-xs" type="submit" >Ver Solicitudes</button></a>
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
        <a href="?r=solicitar%2Fcreate"><button class="btn btn-default" type="submit">Solicitar</button></a>
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
                'id',
                'nombre',
                'apellido_p',
                'apellido_m',
                //'fecha_empleado',

                ['class' => 'yii\grid\ActionColumn'],
              ],
        ]) ?>

      </div>
      <div class="panel-footer">
        <a href="?r=resultado%2Fcreate"><button class="btn btn-default" type="submit">Firmar</button></a>
      </div>
    </div>
  </div>
</div>
