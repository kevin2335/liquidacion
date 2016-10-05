<?php
//dev
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FirmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

<<<<<<< HEAD



=======
$this->title = 'Firmar';
>>>>>>> refs/remotes/origin/Aloha
?>

<div class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 align="center">Firmar</h1>
    </div>
<<<<<<< HEAD

    <div class="panel-body">
      <h2> <small>"Certificar que la labor del funcionario esté al día y que haya entregado, registro de notas(si aplica), llaves, equipo u propiedad universitaria y entre otros."</small></h2>
      </div>
=======
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

>>>>>>> refs/remotes/origin/Aloha
      <div class="panel-footer">
        <a aling="center"><button class=" btn-default" type="submit">Firmar</button></a>
    </div>
    </div>
</div>
</div>
