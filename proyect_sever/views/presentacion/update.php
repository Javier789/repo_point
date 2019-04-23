<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */

$this->title = 'Update Presentacion: ' . $model->codigoProducto;
$this->params['breadcrumbs'][] = ['label' => 'Presentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigoProducto, 'url' => ['view', 'codigoProducto' => $model->codigoProducto, 'idMarca' => $model->idMarca]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="presentacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
