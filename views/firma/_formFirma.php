<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Firma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="firma-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id_dept')->textInput() ?>
    <?= $form->field($model, 'id_supervisor')->textInput() ?>
    <?= $form->field($model, 'id_certificacion')->textInput() ?>
    <?= $form->field($model, 'firma')->radioList([1 => 'Aceptar', 0 => 'Rechazar'])->label(False);?>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>

</div>
