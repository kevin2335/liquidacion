<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SupervisorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supervisors';
?>
<div class="supervisor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Supervisor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_dept',
            'nombre_sup',
            'apellido_m_sup',
            'apellido_p_sup',
            'idDept.nombre_dept',
            'nombreCompleto',
            [
               'label' => 'Activo:',
               'format' => 'html',
               'value' => 'activoLabel',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
