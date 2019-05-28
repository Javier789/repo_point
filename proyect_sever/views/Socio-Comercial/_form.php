<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SocioComercial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="socio-comercial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idSocioComercial')->textInput() ?>

    <?= $form->field($model, 'fechaIngreso')->textInput() ?>

    <?= $form->field($model, 'diasAtencion')->textInput() ?>

    <?= $form->field($model, 'rubro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'localidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoSocio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'encargado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
