<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Firma */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Firmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firma-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
      Gracias por Llenar el cuestionario
    </p>
    <p>
        <?= Html::a('Firmar', ['/firmar/create', 'id' => $model->id_certificacion], ['class' => 'btn btn-primary']) ?>
    </p>
    <p>
        <?= Html::a('Rechazar', ['/firmar/deny', 'id' => $model->id_certificacion], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
