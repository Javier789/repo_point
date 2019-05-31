<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SocioComercial */
    
$this->params['breadcrumbs'][] = ['label' => 'Socio Comercials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="socio-comercial-create">
    <br/>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
