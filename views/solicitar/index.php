<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SolicitarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Solicitar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'id_certificacion',
            'nombre',
            'apellido_m',
            'apellido_p',
            // 'seguro_social',
            // 'nombramiento',
            // 'puesto',
            // 'oficina_division',
            // 'fecha_empleado',
            // 'razon_cese',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
