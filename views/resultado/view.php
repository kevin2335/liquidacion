<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Resultado */
$this->title = $models[0]->certificacion->empleado->nombre;
//echo "<pre>";print_r($models[0]->certificacion);echo "<pre>";die();
//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resultado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $models[0]->id], ['class' => 'btn btn-primary']) ?>
      <a href="index.php?r=firma%2Fcreate"><button class="btn btn-default" type="submit">Aceptar</button></a>
        <?= Html::a('Delete', ['delete', 'id' => $models[0]->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de borrar esto?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $models[0],
        'attributes' => [
            'id',
            'id_supervisor',
            'id_certificacion',
            'resultado',
            'comentario:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
