<?php
/* @var $this yii\web\View */

use scotthuangzl\googlechart\GoogleChart;
?>
<div class="site-index">

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="display-t js-fullheight">
                    <div class="display-tc js-fullheight animate-box fadeIn animated-fast" data-animate-effect="fadeIn">
                        <h1>Bienvenido</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="width: 900px; height: 500px;">
                <?php
                $lisComp = app\models\ComprobantesCompra::find()->all();
                $arr = array();
                array_push($arr, array('Fecha', 'Unidades'));
                foreach ($lisComp as $c) {
                    array_push($arr, array($c->fechaIngreso, $c->total()));
                }
                echo GoogleChart::widget(array('visualization' => 'LineChart',
                    'data' =>
                    $arr
                    ,
                    'options' => array('title' => 'Ultimas compras de mercaderia', 'backgroundColor'=>"{ fill:'transparent'}")
                    ));
                ?>
            </div>
        </div>
    </div>


</div>

