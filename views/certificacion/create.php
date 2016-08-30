<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Certificacion */

$this->title = 'Create Certificacion';
$this->params['breadcrumbs'][] = ['label' => 'Certificacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
