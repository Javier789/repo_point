<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presentacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigoProducto')->textInput() ?>

    <?= $form->field($model, 'costo')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto')->textInput() ?>

    <?= $form->field($model, 'ganancia')->textInput() ?>

    <?= $form->field($model, 'precioSugerido')->textInput() ?>

    <?= $form->field($model, 'idProducto')->textInput() ?>

    <?= $form->field($model, 'idMarca')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
