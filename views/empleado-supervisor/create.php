<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EmpleadoSupervisor */

$this->title = 'Create Empleado Supervisor';
$this->params['breadcrumbs'][] = ['label' => 'Empleado Supervisors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleado-supervisor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
