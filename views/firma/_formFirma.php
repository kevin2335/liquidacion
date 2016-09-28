<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Firma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="firma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php foreach ($firmas as $key => $model): ?>

        <p><?= Html::encode($model->id_supervisor); ?></p>

        <?= $form->field($model,  '['.$key.']firma')->radioList([ 1=> 'Aceptar', 0=> 'Rechazar'])->label(True);?>
  <?php endforeach; ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>

</div>
