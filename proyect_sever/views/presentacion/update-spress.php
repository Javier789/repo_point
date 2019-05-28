<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */
/* @var $stockData  app\models\FormEpressPresentacion*/


$this->title = 'Create Presentacion';
$this->params['breadcrumbs'][] = ['label' => 'Presentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentacion-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?=
    $this->render('_form_spress', [
        'model' => $model,
        'stockData'=>$stockData
 ])
    ?>



</div>
