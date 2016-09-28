<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Certificacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="certificacion-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id_estado')->radioList([2 => 'Aceptar', 3 => 'Rechazar'])->label(False);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
