<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CertificacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Certificacion';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Certificacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_empleado',
            'id_estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
