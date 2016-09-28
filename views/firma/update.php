<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Firma */

$this->title = 'Firma: ' . $model->supervisor->nombre_sup;
$this->params['breadcrumbs'][] = ['label' => 'Firmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="firma-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formFirma', [
        'model' => $model,
    ]) ?>

</div>
