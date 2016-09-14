<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 align ="center">Recursos Humanos</h1>
      </div>
      <div class="panel-footer">
        <button class="btn btn-default btn-xs" type="submit" >Ver Solicitudes</button>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1>Solicitar</h1>
      </div>
      <div class="panel-body">
          <h4>Solicitar una certificación de relevo de responsabilidad de empleado</h4>
      </div>
      <div class="panel-footer">
        <a href="?r=solicitar%2Fcreate"><button class="btn btn-default" type="submit">Solicitar</button></a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1>Firmar</h1>
      </div>
      <div class="panel-body">

      </div>
      <div class="panel-footer">
        <button class="btn btn-default" type="submit">Firmar</button>
      </div>
    </div>
  </div>
</div>
