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
        ->orderBy('nombre')
        ->column();

$marcas = app\models\Marca::find()
        ->select(['nombre'])
        ->indexBy('codigoEmpresa')
        ->orderBy('codigoEmpresa')
        ->column();
?>

<div class="presentacion-form"  ng-app="myApp" ng-controller="myCtrl">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 bg-primary text-light pt-2" >
                <h3 class="text-center">Nuevo Producto</h3>
            </div>
        </div>
        <div class="row bg-light">
            <div class="col-md-6 border-bottom border-primary">
                <div class="blockquote">
                    <div class="form-group">
                        <label for="cboxArticulo">Artícula</label>
                        <?= $form->field($model, 'idProducto')->dropDownList($producto, ['prompt' => '--Seleccione--', 'class' => 'form-control-lg my-1 text-primary', 'style' => 'font-size:24px', 'id' => 'cboxArticulo'])->label(false) ?>
                    </div>

                </div>
            </div>
            <div class="col-md-6 border-bottom border-primary">
                <div class="blockquote">

                    <label for="inlineFormInputGroupUsername2">Código de barra</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <?= $form->field($model, 'codigoProducto')->textInput(['class' => 'form-control-lg', 'placeholder' => 'Codido de barra', 'style' => 'font-size:24px'])->label(false) ?>

                        <div class="input-group-prepend">
                            <spam style="margin:2px;"><i class="fa fa-barcode fa-3x text-primary"></i></spam>
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
                <div class="col-md-6" style="padding-left: 0px;">
                    <div class="card border border-primary">
                        <div class="card-header bg-primary text-light">
                            <h3> Descripción</h3>
                        </div>
                        <div class="card-body">
                            <h4> Descripción del producto </h4>
                            <?= $form->field($model, 'descripcion')->textarea(['type' => 'textarea', 'maxlength' => true, 'rows' => '6', 'class' => 'form-control-lg my-1 text-primary', 'style' => 'font-size:12px; height:60px;width: 95%;'])->label(false) ?>
                        </div>
                        <div class="row m-2">
                            <div class="col-md-5">
                                <h5 class="py-2">Marca:</h5>
                            </div>
                            <div class="col-md-7">

                                <?= $form->field($model, 'idMarca')->dropDownList($marcas, ['prompt' => '--Seleccione--', 'class' => 'form-control-lg my-1 text-primary', 'style' => 'font-size:24px'])->label(false) ?>
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
                                            'step' => 'any'
                                        ])
                                        ->label(false)
                                ?>
                            </div>
                        </div>
                        <!--<div class="row m-2">
                            <div class="col-md-5">
                                <h5 class="py-2">Ganancia:</h5>
                            </div>
                            <div class="col-md-7">
                                
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
                                 
                                {{(ganancia / precioSugerido) * 100| number}} %
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-md-5">
                                <h5 class="py-2">Comision del Socio:</h5>
                            </div>
                            <div class="col-md-7">
                                
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
                                
                                <br>
                                {{(gananciaSocio / precioSugerido)*100| number}} %
                            </div>
                        </div> -->
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
                                                        'step' => 'any'
                                            ])
                                            ->label(false)
                                    ?> 

                                    <span> <i class="fa fa-calculator fa-lg text-primary "></i></span>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success', 'style' => 'font-size:1.5em', 'ng-click' => 'guardarCategorias()']) ?>
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
                            <?=
                                    $form->field($model, 'foto')
                                    ->fileInput(
                                            ['name' => 'file', 'class' => 'inputfile'])
                                    ->widget(ImageInput::className(), [
                                        'value' => $model->foto ? $model->foto : '/img/current-image.png', //Optional current value
                            ]);
                            ?>

                        </div>
                    </div>
                    <!--                    <div class="row">
                                            <div class="col-md-12 text-right my-2"><a class="btn btn-primary" href="#"><i class="fa fa-upload fa-fw fa-lg"></i>&nbsp;Subir foto </a></div>
                                        </div>-->
                </div>
            </div>
        </div>

    </div>
    <!-- .................................................................-->

    <?php ActiveForm::end(); ?>
    <div>
        <table class="table table-bordered table-responsive-md table-striped text-center">
            <thead>
                <tr>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Ganancia</th>
                    <th class="text-center">Procentaje de Ganancia</th>
                    <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="d in detalles">
                    <td>{{d.nombreCategoria}}</td>
                    <td><span style="padding: 1rem 5rem;" ng-keyup="changeValueMonto(d, $event)" contenteditable="true">{{d.monto}}</span></td>
                    <td>{{d.monto * 100 / costo | number}}%</td>
                    <td>{{d.monto + costo}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<script>

    var app = angular.module('myApp', []);
    app.controller('myCtrl', function ($scope, $http) {
        $http.get('http://localhost:8080/index.php?r=rest-lista-precios/index&id=5566')
                .then(function (response) {
                    $scope.detalles = response.data;
                });
        $scope.costo = <?= $model->costo ? $model->costo : 0 ?>;
        //$scope.cantidad = (document.getElementById('porcentajeGananciaSocio').value / 100) * $scope.precioSugerido;
//        $scope.calculo = function (event) {
//            var porcentajeGananciaSocio = event.target.value;
//            $scope.cantidad = (porcentajeGananciaSocio / 100) * $scope.precioSugerido;
//        };
//        $scope.changeValue = function (d, event) {
//            $scope.detalles.forEach(function (element) {
//                if (element.idCategoria === d.idCategoria && element.idPresentacion === d.idPresentacion) {
//                    if (event.target.textContent === "") {
//                        element.porcentajeGananciaSocio = 0;
//                    } else {
//                        element.porcentajeGananciaSocio = event.target.textContent * 1;
//                    }
//                }
//            });
//        };
        $scope.changeValueMonto = function (d, event) {
            $scope.detalles.forEach(function (element) {
                if (element.idCategoria === d.idCategoria && element.idPresentacion === d.idPresentacion) {
                    console.log(event);
                    if (event.target.textContent === "") {
                        element.monto = 0;
                    } else {
                        element.monto = event.target.textContent * 1;
                    }
                }
            });
        };
        $scope.guardarCategorias = function () {
            $http.post('http://localhost:8080/index.php?r=rest-lista-precios/save', $scope.detalles).then(
                    function (response) {
                        console.log(response);
                    });
        };
    });
</script>