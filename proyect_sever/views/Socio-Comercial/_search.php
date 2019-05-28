<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SocioComercialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="socio-comercial-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idSocioComercial') ?>

    <?= $form->field($model, 'fechaIngreso') ?>

    <?= $form->field($model, 'diasAtencion') ?>

    <?= $form->field($model, 'rubro') ?>

    <?= $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'localidad') ?>

    <?php // echo $form->field($model, 'tipoSocio') ?>

    <?php // echo $form->field($model, 'encargado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
