<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\DetalleCategoria */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="categoria-form" >

    <?php $form = ActiveForm::begin([
                'id' => 'update-form',
                'method' => 'post',
                'action' => Url::to(['categoria/guardar-lista-precios'])
    ]); ?>
    <?= Html::label($model->categoria->nombre); ?>
    <?= $form->field($model, 'porcentajeGananciaSocio')->textInput(['class' => 'form-control', 'ng-keyup' => 'calculo($event,' . $model->idPresentacion . ',' . $model->idCategoria . ')', 'id' => 'porcentajeGananciaSocio', 'type' => 'number', 'max' => '100']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
