<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Firma */

$this->title = 'Firma:';
$this->params['breadcrumbs'][] = ['label' => 'Firmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
print_r($model->errors);
?>
<div class="firma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
