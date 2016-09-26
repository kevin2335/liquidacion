<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Certificacion */

$this->title = 'Certificacion:';
//echo "Cetificacion:". $_REQUEST['name'];
//$this->title = $model->certificacion;
$this->params['breadcrumbs'][] = ['label' => 'Certificacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formCert', [
        'model' => $model,
    ]) ?>

</div>
