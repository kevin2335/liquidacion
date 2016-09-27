<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Firma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="firma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_supervisor')->textInput() ?>

    <?= $form->field($model, 'id_certificacion')->textInput() ?>

    <?= $form->field($model, 'firma')->textInput();?>

    <?= $form->field($model, 'fecha_firma')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
