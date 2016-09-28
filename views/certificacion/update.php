<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Certificacion */

$this->title = 'Certificacion: ' . $model->empleado->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Certificacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="certificacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formCert', [
        'model' => $model,
    ]) ?>

</div>
