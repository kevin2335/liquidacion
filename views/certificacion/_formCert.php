<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resultado */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="certificacion-form">

    <?php $form = ActiveForm::begin(); ?>
<h3> <small>this->Certificacion->Empleado->name</title></small></h3>
  <?= $form->field($model, 'id_estado')->radioList(['2' => 'Aceptar', '3' => 'Rechazar'])->label(False); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
