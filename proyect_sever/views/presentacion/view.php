<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */

$this->title = $model->codigoProducto;
$this->params['breadcrumbs'][] = ['label' => 'Presentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="presentacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'codigoProducto' => $model->codigoProducto, 'idMarca' => $model->idMarca], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'codigoProducto' => $model->codigoProducto, 'idMarca' => $model->idMarca], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codigoProducto',
            'costoXUntidad',
            'descripcion',
            'foto',
            'porcentajeRecargo',
            'valorRecargo',
            'idProducto',
            'idMarca',
        ],
    ]) ?>

</div>
