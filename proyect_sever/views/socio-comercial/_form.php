<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SocioComercial */
/* @var $form yii\widgets\ActiveForm */
/* @var $encargado app\models\Persona */
$tipoSocio=['MAY'=>'Mayorista', 'MIN'=>'Minorista']
?>

<div class="socio-comercial-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 bg-primary text-light pt-2" >
                <h3 class="text-center">Nuevo Social Comercial</h3>
            </div>
        </div>
        <div class="row bg-light">
            <div class="col-md-6 border-bottom border-primary">
                <div class="blockquote">
                    <div class="form-group">
                        <label for="cboxArticulo">Razon Social</label>
                        <?= $form->field($model, 'razonSocial')->label(false) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 border-bottom border-primary">
                <div class="blockquote">
                    <div class="form-group">
                        <label for="cboxArticulo">Rubro</label>
                        <?= $form->field($model, 'rubro')->label(false) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-light">
            <div class="col-md-6 border-bottom border-primary">
                <div class="blockquote">
                    <div class="form-group">
                        <label for="cboxArticulo">Localidad</label>
                        <?= $form->field($model, 'localidad')->label(false) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 border-bottom border-primary">
                <div class="blockquote">
                    <div class="form-group">
                        <label for="cboxArticulo">Direccion</label>
                        <?= $form->field($model, 'direccion')->label(false) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-light">
            <div class="col-md-6 border-bottom border-primary">
                <div class="blockquote">
                    <div class="form-group">
                        <label for="cboxArticulo">Tipo Socio</label>
                        <?= $form->field($model, 'tipoSocio')->dropDownList($tipoSocio, ['prompt' => '--Seleccione--'])->label(false) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 border-bottom border-primary">
                <div class="blockquote">
                    <div class="form-group">
                        <label for="cboxArticulo">Direccion</label>
                        <?= $form->field($model, 'direccion')->label(false) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 bg-primary text-light pt-2" >
                <h3 class="text-center">Encargado</h3>
            </div>
        </div>

    </div>

    <?php
//    $form->field($model, 'idSocioComercial')->textInput()
//    $form->field($model, 'fechaIngreso')->textInput()
//    $form->field($model, 'diasAtencion')->textInput()
//    $form->field($model, 'rubro')->textInput(['maxlength' => true])
//    $form->field($model, 'direccion')->textInput(['maxlength' => true])
//    $form->field($model, 'localidad')->textInput(['maxlength' => true])
//    $form->field($model, 'tipoSocio')->textInput(['maxlength' => true])
    ?>

    <div class="form-group">
        <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success', 'style' => 'font-size:1.5em']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>