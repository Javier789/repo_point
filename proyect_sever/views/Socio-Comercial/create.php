<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SocioComercial */

$this->title = 'Create Socio Comercial';
$this->params['breadcrumbs'][] = ['label' => 'Socio Comercials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="socio-comercial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
