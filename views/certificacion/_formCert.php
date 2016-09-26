<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resultado */
/* @var $form yii\widgets\ActiveForm */
//this->certificacion->id_empleado->name
?>

<div class="certificacion-form">

    <?php $form = ActiveForm::begin(); ?>
  <?= $form->field($model, 'id_estado')->radioList(['2' => 'Aceptar', '3' => 'Rechazar'])->label(False);?>

    <div class="form-group">
        <?php//= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
          <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
