<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */


$this->params['breadcrumbs'][] = ['label' => 'Presentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentacion-create">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
