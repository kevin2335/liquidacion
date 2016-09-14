<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Solicitar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitar-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h1 align ="center">Solicitud</h1>
          </div>
            <div class="panel-body">
              <div class="col-sm-6">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'apellido_p')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'apellido_m')->textInput(['maxlength' => true]) ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <?= $form->field($model, 'seguro_social')->textInput() ?>
                    <?= $form->field($model, 'nombramiento')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'puesto')->textInput(['maxlength' => true]) ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <?= $form->field($model, 'oficina_division')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'fecha_empleado')->textInput() ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <?= $form->field($model, 'razon_cese')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                  </div>
                </div>
              </div>
            </div>
          <div class="panel-footer">
              <?= Html::submitButton($model->isNewRecord ? 'Solicitar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
          </div>
        </div>
      </div>
    </div>





    <?php ActiveForm::end(); ?>

</div>
