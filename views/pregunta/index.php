<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PreguntaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Preguntas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregunta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar Pregunta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDept.nombre_dept',
            'pregunta:ntext',
            'incorrecta:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
