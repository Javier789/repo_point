<?php
/* @var $this yii\web\View */

use scotthuangzl\googlechart\GoogleChart;
?>
<div class="site-index">

    <div class="container m-2 p-2" style="background-color: rgba(255,255,255,0.5)">
        <div class="row">
            <div class="col">
                <?php
                $lisComp = app\models\ComprobantesCompra::find()->limit(5)->all();
                $arr = array();
                array_push($arr, array('Fecha', 'Total $'));
                foreach ($lisComp as $c) {
                    array_push($arr, array($c->fechaIngreso, $c->total()));
                }
                echo GoogleChart::widget(array('visualization' => 'LineChart',
                    'data' =>
                    $arr
                    ,
                    'options' => [
                        'title' => 'Últimas Compras',
                        'fontName' => 'Verdana',
                        'height' => 300,
                        'width' => 500,
                        'backgroundColor' => 'transparent',
                    ]
                ));
                ?>
            </div>
            <div class="col">
                <?php
                $list = app\models\Stock::find()->orderBy(['cantidad' => SORT_ASC])->limit(50)->all();
                $arr = array();
                array_push($arr, array('Producto', 'Stock'));
                foreach ($list as $s) {
                    array_push($arr, array($s->presentacion->producto->nombre .' '.$s->presentacion->descripcion, $s->cantidad));
                }
                echo GoogleChart::widget(array('visualization' => 'BarChart',
                    'data' =>
                    $arr
                    ,
                    'options' => [
                        'fontName' => 'Verdana',
                        'height' => 300,
                        'width' => 500,
                        'backgroundColor' => 'transparent',
                        'vAxis' => [
                            'gridlines' => [
                                'color' => '#51b19a',
                                'count' => 10
                            ],
                            'minValue' => 0
                        ],
                    ]
                ));
                ?>
            </div>
        </div>

    </div>

