<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SocioComercial */

$this->title = 'Update Socio Comercial: ' . $model->idSocioComercial;
$this->params['breadcrumbs'][] = ['label' => 'Socio Comercials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSocioComercial, 'url' => ['view', 'id' => $model->idSocioComercial]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="socio-comercial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
