<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Solicitar */
$this->title = 'Create Solicitar';
$this->params['breadcrumbs'][] = ['label' => 'Solicitar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitar-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
