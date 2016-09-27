<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Firma */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Firmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firma-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
      Gracias por Llenar el cuestionario
    </p>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model[0]->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model[0]->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de borrar esto?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model[0],
        'attributes' => [
            'id',
            'id_supervisor',
            'id_certificacion',
            'firma',
            'fecha_firma',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
