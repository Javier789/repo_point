<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SocioComercialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Socio Comercials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="socio-comercial-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Socio Comercial', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idSocioComercial',
            'fechaIngreso',
            'diasAtencion',
            'rubro',
            'direccion',
            //'localidad',
            //'tipoSocio',
            //'encargado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
