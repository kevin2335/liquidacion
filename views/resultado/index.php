<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ResultadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resultados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resultado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Resultado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
       'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'supervisor.nombre_sup',
            'id_certificacion',
          //  'certificacion.empleado.nombre',
            'resultado',
            'comentario',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
