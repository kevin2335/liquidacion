<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FirmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Firma';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firma-index">
  <div class="panel panel-default">
      <div class="panel-heading">
        <h1 align ="center">Firmar</h1>

      </div>
      <div class="panel-body">

        <p>
          Seguro que desea firmar?
        </p>


        <button class="btn btn-default" type="submit">Aceptar</button>
        <button class="btn btn-default" type="submit">Rechazar</button>

      </div>
    </div>
  </div>
</div>
