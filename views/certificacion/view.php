<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Certificacion */
//$this->title = $model->certificacion->empleado->nombre;

$this->title = $model->empleado->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Certificacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de borrar esto?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_empleado',
            'id_estado',
        ],
    ]) ?>

</div>
