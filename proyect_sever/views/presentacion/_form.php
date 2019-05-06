<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use consynki\yii\input\ImageInput;

/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */
/* @var $form yii\widgets\ActiveForm */

$producto = app\models\Producto::find()
        ->select(['nombre'])
        ->indexBy('id')
        ->column();

$marcas = app\models\Marca::find()
        ->select(['nombre'])
        ->indexBy('codigoEmpresa')
        ->column();
?>

<div ng-app="myApp" ng-controller="myCtrl" class="presentacion-form" >

    <?php $form = ActiveForm::begin(); ?>
    <div class="py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 bg-primary text-light pt-2" >
                    <h3 class="text-center">Nuevo Producto</h3>
                </div>
            </div>
            <div class="row bg-light">
                <div class="col-md-12 border-bottom border-primary">
                    <div class="blockquote">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1"></label>
                            <?= $form->field($model, 'idProducto')->dropDownList($producto, ['class' => 'form-control-lg my-1 text-primary', 'style' => 'font-size:24px'])->label(false) ?>
                        </div>
                        <div class="form-group">
                            <label for="inlineFormInputGroupUsername2">Código de barra</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <?= $form->field($model, 'codigoProducto')->textInput(['class' => 'form-control-lg', 'placeholder' => 'Codido de barra', 'style' => 'font-size:24px'])->label(false) ?>

                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-barcode fa-2x text-primary"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ........................................... -->
    <div class="py-2" >
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="">
                    <div class="card border border-primary">
                        <div class="card-header bg-primary text-light">
                            <h3> Descripción</h3>
                        </div>
                        <div class="card-body">
                            <h4> Nombre del producto </h4>
                            <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true, 'class' => 'form-control-lg my-1 text-primary', 'style' => 'font-size:12px']) ?>
                        </div>
                        <div class="row m-2">
                            <div class="col-md-5">
                                <h5 class="py-2">Marca:</h5>
                            </div>
                            <div class="col-md-7">

                                <?= $form->field($model, 'idMarca')->dropDownList($marcas, ['class' => 'form-control-lg my-1 text-primary', 'style' => 'font-size:24px'])->label(false) ?>
                            </div>
                        </div>  
                        <div class="row m-2">
                            <div class="col-md-5">
                                <h5 class="py-2">Costo:</h5>
                            </div>
                            <div class="col-md-7">
                                <?=
                                        $form->field($model, 'costo')
                                        ->textInput(['class' => 'form-control-lg',
                                            'type' => 'number',
                                            'placeholder' => '$0,00',
                                            'style' => 'font-size:16px',
                                            'ng-model' => 'costo',
                                            'ng-change' => 'calculo()'
                                        ])
                                        ->label(false)
                                ?>
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-md-5">
                                <h5 class="py-2">Ganancia:</h5>
                            </div>
                            <div class="col-md-7">
                                <?=
                                        $form->field($model, 'ganancia')
                                        ->textInput(
                                                ['class' => 'form-control-lg',
                                                    'type' => 'number',
                                                    'placeholder' => '0,00',
                                                    'style' => 'font-size:16px',
                                                    'ng-model' => 'ganancia',
                                                    'ng-change' => 'calculo()'
                                        ])
                                        ->label(false)
                                ?> 
                                {{(ganancia / precioSugerido) * 100| number}} %
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-md-5">
                                <h5 class="py-2">Comision del Socio:</h5>
                            </div>
                            <div class="col-md-7">
                                <?=
                                yii\bootstrap\Html::input(
                                        'number', 'ganancia-socio', '', [
                                    'id' => 'ganancia-socio',
                                    'class' => 'form-control-lg',
                                    'type' => 'number',
                                    'placeholder' => '0,00',
                                    'style' => 'font-size:16px',
                                    'ng-model' => 'gananciaSocio',
                                    'ng-change' => 'calculo()'
                                ])
                                ?>
                                <br>
                                {{(gananciaSocio / precioSugerido)*100| number}} %
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-md-3">
                                <h5 class="py-2">Precio Sugerido:</h5>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group mb-2 mr-sm-2 input-group-lg">
                                    <?=
                                            $form->field($model, 'precioSugerido')
                                            ->textInput(
                                                    ['class' => 'form-control-lg',
                                                        'type' => 'number',
                                                        'placeholder' => '0,00',
                                                        'style' => 'font-size:16px',
                                                        'ng-model' => 'precioSugerido'
                                            ])
                                            ->label(false)
                                    ?> 
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-primary text-light ml-1 px-2">
                                            <i class="fa fa-calculator fa-lg text-light "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 border-left border-primary bg-light">
                    <div class="row bg-primary text-light py-2">
                        <div class="col-md-12 text-center">
                            <h4 class="">Foto</h4>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <img class="img-fluid d-block w-75 justify-content-center align-items-center" src="<?= Html::encode($model->foto); ?>">
                            <?= $form->field($model, 'foto')->fileInput() ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right my-2"><a class="btn btn-primary" href="#"><i class="fa fa-upload fa-fw fa-lg"></i>&nbsp;Subir foto </a></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- .................................................................-->
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<script>

    var app = angular.module('myApp', []);
    app.controller('myCtrl', function ($scope) {
        $scope.ganancia = <?= $model->ganancia? $model->ganancia : 0 ?>;
        $scope.precioSugerido = <?= $model->precioSugerido? $model->precioSugerido : 0 ?>;
        $scope.costo = <?= $model->costo? $model->costo : 0 ?>;
        $scope.gananciaSocio = $scope.precioSugerido - ($scope.ganancia + $scope.costo);
        $scope.calculo = function () {
            $scope.precioSugerido = $scope.ganancia + $scope.gananciaSocio + $scope.costo;
        }
    });
</script>