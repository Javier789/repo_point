<?php

use yii\helpers\Html;
use yii\grid\GridView; //?
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PresentacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de Articulos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="presentacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

</div>



<!-- -------------------------- ------------------------------------------ -->
<div class="py-0">
    <div class="container">
      <div class="row bg-primary" >
<!--  style=" padding: 10px 5px;height: 60px;"-->
            <div class="col-md-12">
                <?php
                $estado = 0;

                $form = ActiveForm::begin([
                            'id' => 'search-form',
                            'method' => 'get',
                            'action' => Url::to(['presentacion/index']),
                            'options' => ['class' => 'form-inline'],
                        ])
                ?>


                <!-- Form code begins -->
                <?= $form->field($searchModel, 'txtSearch')->textInput(['style'=>'font-size:1.5em;'])->label('Buscar:') ?> 
                <span>
                      <?= Html::submitButton('<i class="fa  fa-search fa-2x" style="height:0px"></i>', ['class' => 'btn  btn-success m-1', 'id' => 'botSubmit','style'=>'height: 32px; padding-top: 0px; width: 42px;']) ?>
                </span>
                <span  style="position: absolute;right: 5px;">
                      <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success ', 'style'=>'font-size:1.5em;']) ?>
                </span>
            </div>
  
            <?php ActiveForm::end() ?>
         </div>
        </div>
</div>


<!-- -------------------------- ------------------------------------------ -->
<?=
ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('_item_articulo', ['model' => $model, 'findText' => 'Al']);
    },
    // Customzing options for pager container tag
    'options' => [
        'tag' => 'div',
        'class' => 'pager-wrapper',
        'id' => 'pager-container',
    ],
    'emptyText' => '<h5>NO HAY ARTICULOS PARA MOSTRAR</h5>',
    'pager' => [
        'firstPageLabel' => 'first',
        'lastPageLabel' => 'last',
        'prevPageLabel' => '<span class="glyphicon glyphicon-chevron-left"></span>',
        'nextPageLabel' => '<span class="glyphicon glyphicon-chevron-right"></span>',
        //'class'     => InfiniteScrollPager::className(),

      ],
]);
?>    

