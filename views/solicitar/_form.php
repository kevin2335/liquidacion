<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use app\models\Departamento;
use yii\helpers\ArrayHelper;

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
              <div class="row">
              <div class="col-sm-6">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'nombramiento')->textInput(['maxlength' => true]) ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="panel panel-default">
                  <div class="panel-body">
                      <?= $form->field($model, 'puesto')->textInput(['maxlength' => true]) ?>
                      <?= $form->field($model, 'oficina_division')->dropDownList(ArrayHelper::map(Departamento::find()->select(['nombre_dept'])
                                                                  ->all(),'nombre_dept','nombre_dept'),['prompt'=>'Seleccione Oficina o División']);?>
                      <?= $form->field($model, 'razon_cese')->textInput(['maxlength' => true]) ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3">
              </div>
              <div class="col-sm-6">
                <div class="panel panel-default">
                  <div class="panel-body">
                      <?= $form->field($model, 'fecha_empleado')->widget(DateControl::classname(), ['type' => DateControl::FORMAT_DATE]); ?>
                  </div>
                </div>
              </div>
            <div class="col-xs-3">
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
