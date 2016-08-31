<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Supervisor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supervisor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_dept')->textInput() ?>

    <?= $form->field($model, 'nombre_sup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido_m_sup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido_p_sup')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
