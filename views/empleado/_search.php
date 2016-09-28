<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpleadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empleado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apellido_m') ?>

    <?= $form->field($model, 'apellido_p') ?>

    <?echo $form->field($model, 'seguro_social') ?>

    <?echo $form->field($model, 'nombramiento') ?>

    <?echo $form->field($model, 'puesto') ?>

    <?echo $form->field($model, 'oficina_division') ?>

    <?echo $form->field($model, 'fecha_empleado') ?>

    <?echo $form->field($model, 'razon_cese') ?>

    <?echo $form->field($model, 'created_at') ?>

    <?echo $form->field($model, 'updated_at') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
