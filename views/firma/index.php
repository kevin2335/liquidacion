<?php
//dev
use yii\helpers\Html;
use yii\grid\GridView;

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
      <div class="panel-footer">
        <<?php//a aling="center"><button class=" btn-default" type="submit">Firmar</button></a>?>
          <?= $form->field($model, 'id_estado')->radioList(['2' => 'Aceptar', '3' => 'Rechazar'])->label(False);?>
    </div>
    </div>
</div>
</div>
