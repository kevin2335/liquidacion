<?php
//dev
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FirmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Firmar';
?>

<div class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 align="center"><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="panel-body">
      <h2> <small>"Certificar que la labor del funcionario esté al día y que haya entregado, registro de notas(si aplica), llaves, equipo u propiedad universitaria y entre otros."</small></h2>

      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          //'filterModel' => $searchModel,
          'columns' => [
              ['class' => 'yii\grid\SerialColumn'],
              'departamento.nombre_dept',
              'supervisor.nombreCompleto',
              'certificacion.empleado.nombre',
              [
                 'label' => 'Estatus',
                 'format' => 'html',
                 'value' => 'firmaLabel',
              ],
              [
                  'label' => 'Ver',
                  'format' => 'html',
                  'value' => function ($model) {
                      return Html::a('Ver Solicitud', ['view', 'id' => $model->id_certificacion],['class' => 'btn btn-info btn-xs']);
                  }
              ],
          ],
      ]); ?>
    </div>

      <div class="panel-footer">
    </div>
    </div>
</div>
</div>
