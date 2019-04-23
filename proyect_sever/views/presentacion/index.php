<?php

use yii\helpers\Html;
use yii\grid\GridView;//?

use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PresentacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Presentacions';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="presentacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Presentacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            'codigoProducto',[
                'attribute' => 'foto',
                'format' => ['image',['width'=>'200','height'=>'200']],
                'label' => 'Image',
                'contentOptions'=>['style'=>'width:200px']
                            
             ],
            ['attribute' => 'producto.nombre',
                         'label'=>'Nombre',
                'headerOptions' => ['style' => 'width:20%'],
            ],
            'descripcion',
            'costo',
            'ganancia',
            'precioSugerido',
            
            
            //'idMarca',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>


 <!-- -------------------------- ------------------------------------------ -->
  <div class="py-0">
    <div class="container" style="padding: 0 0 0 0;margin: 0 0 0 0; width: 100%;">
      <div class="row bg-primary" style=" padding-top: 5px;">
        <div class="col-md-7">

        <?php
        $estado=0;

        $form = ActiveForm::begin([
            'id' => 'search-form',
            'method' => 'get',
            'action' => Url::to(['presentacion/index']),
            'options' => ['class' => 'form-inline'],
        ]) ?>
            <?= $form->field($searchModel, 'txtSearch')->textInput()->label('Buscar:') ?>
> 
            <!-- Form code begins -->
          
          </div>

        <div class="col-md-4">

        </div>
       <!-- Form code ends --> 
            <div class="form-group col-md-1">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('<i class="fa  fa-search fa-2x"></i>', ['class' => 'btn  btn-success','id'=>'botSubmit']) ?>
                </div>
            </div>
        <?php ActiveForm::end() ?>
      </div>
    </div>
  </div>


<!-- -------------------------- ------------------------------------------ -->
     <?= ListView::widget([
    'dataProvider' => $dataProvider,//$modPedidos,
    'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('_list_item_pedido',['model' => $model,'findText'=>'Al']);
    },
             // Customzing options for pager container tag
        'options' => [
            'tag' => 'div',
            'class' => 'pager-wrapper',
            'id' => 'pager-container',
        ],
    'pager' => [
        'firstPageLabel' => 'first',
        'lastPageLabel' => 'last',
        'prevPageLabel' => '<span class="glyphicon glyphicon-chevron-left"></span>',
        'nextPageLabel' => '<span class="glyphicon glyphicon-chevron-right"></span>',
        
    ],

]); ?>    
