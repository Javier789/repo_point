<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */
    
$this->params['breadcrumbs'][] = ['label' => 'Presentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="presentacion-update">

    <br/>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
