<?php
/* @var $this yii\web\View */
?>
<div class="presentacion-create" ng-app="myApp" ng-controller="myCtrl">
    <table class="table">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Procentaje Ganancia Socio</th>
                <th>Monto en $</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="d in detalles">
                <td>{{d.nombreCategoria}}</td>
                <td><span ng-keyup="changeValue(d, $event)" contenteditable="true">{{d.porcentajeGananciaSocio}}</span></td>
                <td>{{d.porcentajeGananciaSocio / 100 * 45}}</td>
            </tr>
        </tbody>
    </table>
    {{detalles}}
</div>
<script>

    var app = angular.module('myApp', []);
    app.controller('myCtrl', function ($scope, $http) {
        $http.get('http://localhost:8080/index.php?r=rest-lista-precios/index&id=5566')
                .then(function (response) {
                    $scope.detalles = response.data;
                });
        //$scope.precioSugerido =  $model->precioSugerido ? $model->precioSugerido : 0 ?>;
        //$scope.cantidad = (document.getElementById('porcentajeGananciaSocio').value / 100) * $scope.precioSugerido;
        $scope.calculo = function (event) {
            var porcentajeGananciaSocio = event.target.value;
            $scope.cantidad = (porcentajeGananciaSocio / 100) * $scope.precioSugerido;
        }
        $scope.changeValue = function (d, event) {
            $scope.detalles.forEach(function (element) {
                if (element.idCategoria === d.idCategoria && element.idPresentacion === d.idPresentacion) {
                    if (event.target.textContent == "") {
                        element.porcentajeGananciaSocio = 0;
                    } else {
                        element.porcentajeGananciaSocio = event.target.textContent * 1;
                    }

                    console.log(element);
                }
            });
        }
    });
</script>