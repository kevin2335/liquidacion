<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Solicitar */

$this->title = 'Create Solicitar';
$this->params['breadcrumbs'][] = ['label' => 'Solicitars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
