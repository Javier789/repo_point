<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Presentacion */
?>
<div class="presentacion-create" ng-app="myApp" ng-controller="myCtrl">
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'precioSugerido',
            'producto.nombre',
            'descripcion',
        ],
    ])
    ?>
    <?php $form = ActiveForm::begin([
             'id' => 'update-form',
             'method' => 'post',
             'action' => Url::to(['categoria/guardar-lista-precios'])
             
         ]); ?>
    <div class="form-group">
        <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success', 'style' => 'font-size:1.5em']) ?>
    </div>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'categoria.nombre',
                [
                'attribute' => 'porcentajeGananciaSocio',
                'value' => function($model) {
                    return Html::textInput('', $model->porcentajeGananciaSocio, ['class' => 'form-control' ,'ng-keyup' => 'calculo($event)', 'id'=>'porcentajeGananciaSocio']);
                },
                'format' => 'raw'
            ],
               [
                'label' => 'Monto en $',
                'value' => function() {
                    return '{{cantidad}}';
                },
                'format' => 'raw'
            ],
        ],
    ]);
    ?>
    
<?php ActiveForm::end(); ?>
</div>
<script>

    var app = angular.module('myApp', []);
    app.controller('myCtrl', function ($scope) {
        $scope.precioSugerido = <?= $model->precioSugerido ? $model->precioSugerido : 0 ?>;
        $scope.cantidad = (document.getElementById('porcentajeGananciaSocio').value /100) * $scope.precioSugerido ;
        $scope.calculo = function(event){
           $scope.cantidad = (event.target.value/100) * $scope.precioSugerido;
        };
        
    });
</script>