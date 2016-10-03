<?php
use yii\helpers\Url;
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
        <?= Html::a('Update', ['update', 'id' => $id], ['class' => 'btn btn-primary']) ?>

        <a href="<?= Url::to(['firma/create', 'id' => $id]) ?>" class="btn btn-default">Aceptar <span class="glyphicon glyphicon-check"></span></a>

        <?= Html::a('Delete', ['delete', 'id' => $models[0]->id],[
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de borrar esto?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php foreach ($models as $model): ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'resultado',
            'comentario:ntext',
            'created_at:date',
            'updated_at:date',
        ],
    ]) ?>
<?php endforeach;?>
</div>
