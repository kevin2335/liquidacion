<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resultado */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="resultado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php foreach ($resultados as $key => $model): ?>

        <p><?= Html::encode($model->pregunta); ?></p>

        <?= $form->field($model, '['.$key.']resultado')->radioList(['no' => 'No', 'si' => 'Si', 'na' => 'N/A'])->label(false); ?>


        <?= $form->field($model, '['.$key.']comentario')->textarea(['rows' => 6]) ?>
    <?php endforeach; ?>



    <div class="form-group">
        <a href ="?r=resultado%2Fcreate"><?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
