<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */
/* @var $stockData  app\models\FormEpressPresentacion*/

?>
<div class="presentacion-create">

    <br/>
    <?=
    $this->render('_form_spress', [
        'model' => $model,
        'stockData'=>$stockData
 ])
    ?>



</div>
