<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SocioComercial */
/* @var $form yii\widgets\ActiveForm */
/* @var $encargado app\models\Persona */
$encargado = $model->getEncargado0();
$tipoSocio = ['MAY' => 'Mayorista', 'MIN' => 'Minorista']
?>

<div class="socio-comercial-form" ng-app="myApp" ng-controller="myCtrl">
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
        <div class="row bg-light">
            <div class="col-md-12 border-bottom border-primary">
                <div class="blockquote">
                    <div class="form-group">
                        <label>Horario</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" ng-click="setFraccionado(false)" checked>
                            <label class="custom-control-label" for="customRadio1">Horario de Corrido</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" ng-click="setFraccionado(true)">
                            <label class="custom-control-label" for="customRadio2">Fraccionado</label>
                        </div>
                        <table class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline" ng-model="lunes">
                                            <label class="custom-control-label" for="customControlInline">Lunes</label>
                                        </div>
                                    </th>
                                    <th>                                        
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline1">
                                            <label class="custom-control-label" for="customControlInline1">Martes</label>
                                        </div>
                                    </th>
                                    <th>                                        
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline2">
                                            <label class="custom-control-label" for="customControlInline2">Miercoles</label>
                                        </div>
                                    </th>
                                    <th>                                        
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline3">
                                            <label class="custom-control-label" for="customControlInline3">Jueves</label>
                                        </div>
                                    </th>
                                    <th>                                        
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline4">
                                            <label class="custom-control-label" for="customControlInline4">Viernes</label>
                                        </div>
                                    </th>
                                    <th>                                        
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline5">
                                            <label class="custom-control-label" for="customControlInline5">Sábado</label>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                </tr>
                                <tr >
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                </tr>
                                <tr ng-show="fraccionado" >
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                </tr>
                                <tr ng-show="fraccionado" >
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                    <td>
                                        <input>
                                    </td>
                                </tr>                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 bg-primary text-light pt-2" >
                <h3 class="text-center">Encargado</h3>
            </div>
        </div>
        <div class="row bg-light">
            <div class="col-md-6 border-bottom border-primary">
                <div class="blockquote">
                    <div class="form-group">
                        <label for="cboxArticulo">Nombre</label>
                        <?= $form->field($encargado, 'nombre')->label(false) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 border-bottom border-primary">
                <div class="blockquote">
                    <div class="form-group">
                        <label for="cboxArticulo">Apellido</label>
                       <?= $form->field($encargado, 'apellido')->label(false) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success', 'style' => 'font-size:1.5em']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<script>

    var app = angular.module('myApp', []);
    app.controller('myCtrl', function ($scope, $http) {
        $scope.fraccionado = false;
        $scope.setFraccionado = function(value){
            $scope.fraccionado = value;
        }
    });
</script>