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
        <?= Html::submitButton('Firmar', ['class' => 'btn btn-success']) ?>
        <button class=" btn btn-info" data-toggle="modal" data-target="#miventana">
          Rechazar
        </button>
        <div class="modal fade" id="mi ventana" tabindex="-1" role="dialog"aria-labelleby="myModalLabel"aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4
      </div>
        </div>
    </div>
</div>
    <?php ActiveForm::end(); ?>
</div>
</div>
