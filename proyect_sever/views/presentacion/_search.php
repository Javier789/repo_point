<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PresentacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presentacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codigoProducto') ?>

    <?= $form->field($model, 'costoXUntidad') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'foto') ?>

    <?= $form->field($model, 'porcentajeRecargo') ?>

    <?php // echo $form->field($model, 'valorRecargo') ?>

    <?php // echo $form->field($model, 'idProducto') ?>

    <?php // echo $form->field($model, 'idMarca') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
